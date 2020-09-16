<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Requests\PharmacyInventoryRequest;

class PharmacyInventoryController extends Controller
{
    public function index(){
    	$inventorylist = DB::table('pharmacyinventories')
    				->join('medicines', 'medicines.id', '=', 'pharmacyinventories.mid')
                    ->join('types', 'medicines.typeid', '=', 'types.id')
                    ->where('medicines.status',"Listed")
    				->where('pharmacyinventories.pid',session('Pharmacyid'))
    				->orderBy('medicines.name')
					->select('pharmacyinventories.*', 'medicines.name as mname', 'medicines.mrp as mrp', 
                              'medicines.mg as mg', 'types.name as tname')
    				->get();
    	return view('pharmacyhome.pharmacyinventory',['inventorylist'=>$inventorylist]);
    }

    public function inventoryupdate($oid){
    	DB::table('orders')
            ->where('id', $oid)
            ->update(['status' => "Confirmed"]);

        //Pharmacy Inventory Update
        $itemlist = DB::table('ordercarts')
    				->where('oid',$oid)
    				->get();

    	foreach ($itemlist as $key => $value) {
    		$unitperbox = DB::table('medicines')->where('id', $value->mid)->select("unitperbox")->first();
    		$u = (int)$unitperbox->unitperbox;
    		$unit = (int)$value->quantity*$u;
    		
    		if(count((array)DB::table('pharmacyinventories')->where('mid', $value->mid)->where('pid',session('Pharmacyid'))->first())>0){
    			DB::table('pharmacyinventories')
            	->where('mid', $value->mid)
            	->where('pid',session('Pharmacyid'))
            	->increment('unit', $unit);
    		}
    		else {
    			DB::table('pharmacyinventories')->insertGetId(
              	['mid' => $value->mid, 'pid' => session("Pharmacyid"), 'unit' => $unit]
            	);
    		}
    	}

        //Company Tax Update
        $order = DB::table('orders')->where('id', $oid)->first();
        $netammount = (float)$order->total;
        $tax = (float)($netammount*5)/100;
        $taxammount = number_format((float)$tax, 2, '.', '');

        DB::table('companytax')
            ->where('cid', $order->cid)
            ->increment('ammount', $taxammount);

    	return redirect()->route('pharmacyorder.orderlist');
    }

    public function unitsearch(Request $request)
    {
        $term=$request->term;
        $data = DB::table('pharmacyinventories')
            ->join('medicines', 'medicines.id', '=', 'pharmacyinventories.mid')
            ->join('types', 'medicines.typeid', '=', 'types.id')
            ->where('medicines.name','like', '' . $term . '%')
            ->where('medicines.status',"Listed")
            ->where('pharmacyinventories.pid',session("Pharmacyid"))
            ->orderBy('name')
            ->select('pharmacyinventories.*','medicines.*','types.name as tname')
            ->take(5)
            ->get();
        $results=array();
        foreach($data as $key => $v)
        {
            $results[]=['unit'=>$v->unit." Unit Left" ,'value'=>$v->name."(".$v->mg."mg): ".$v->tname];
        }
        return response()->json($results);
    }

    public function itemsearch(Request $req){
        $data = DB::table('pharmacyinventories')
        ->join('medicines', 'medicines.id', '=', 'pharmacyinventories.mid')
        ->join('types', 'medicines.typeid', '=', 'types.id')
        ->where('pharmacyinventories.pid',session("Pharmacyid"))
        ->where('medicines.name','like',''.$req->search . '%')
        ->select('pharmacyinventories.*', 'medicines.name as mname', 'medicines.mrp as mrp', 
                              'medicines.mg as mg', 'types.name as tname')
        ->get();

        if($data){
            foreach($data as $value => $search){
                echo '<tr> <td style="min-width: 300px; max-width: 280px;">' . $search->mname . '</td>
                           <td>' . $search->tname . '</td>
                           <td>' . $search->mg . '</td>
                           <td>' . $search->unit . '</td>
                           <td>' . $search->mrp . '</td>
                      </tr>';
            }
        }
    }
}
