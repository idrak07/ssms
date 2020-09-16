<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\PharmacyPurchaseRequest;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;
use App\Note;
use Redirect;
use PDF;

class PharmacyPurchaseController extends Controller
{
    public function purchase(Request $req){

        if($req->netammount <= 0){
            $req->session()->flash('printmsg', 'Nothing To Print');
            return redirect()->route('pharmacyhome.index');
        }

        if($req->cuscontactno == ""){
            $req->session()->flash('printmsg', 'Customer Contactno Needed');
            return redirect()->route('pharmacyhome.index');
        }
        
        for($i=0; $i<count($req->q); $i++){
            if($req->q[$i] != 0 && $req->medicineid[$i] != "")
            {
                if(count((array)3DB::table('pharmacyinventories')
                    ->where('mid',$req->medicineid[$i])
                    ->where('pid',session("Pharmacyid"))
                    ->where('unit','<',$req->q[$i])
                    ->first())>0)
                {
                    $req->session()->flash('printmsg', 'One or multiple Product Dont Have Required Stock');
                    return redirect()->route('pharmacyhome.index');
                }
            }
        }

        //Purchase Insert
    	$purchaseid=DB::table('purchases')->insertGetId(
          ['pharmacyid' => session('Pharmacyid'), 'cuscontactno' => $req->cuscontactno, 
            'total' => (float)$req->total, 'discount' => (float)$req->discount, 'netammount' => (float)$req->netammount, 
            'date' => date('Y-m-d'), 'time' => Carbon::now('Asia/Dhaka')]
        ); 

        //Purchase Item Update
        foreach($req->medicineid as $key=>$value){
            if($value != "")
            {
                DB::table('purchaseitems')->insertGetId(
                    ['mid' => $value , 'purchaseid' => $purchaseid]
                );
            }
        }  

        for($i=0; $i<count($req->q); $i++)
        {
            if($req->q[$i] != 0 && $req->medicineid[$i] != "")
            {
                if(DB::table('purchaseitems')
                ->where('quantity', null)
                ->where('purchaseid', $purchaseid)
                ->limit(1)
                ->update(['quantity' => $req->q[$i], 'total' => $req->t[$i]])
                )
                {
                    continue;
                }
            }
        }
        
        //Decremetn Inventory
        $purchasedlist = DB::table('purchaseitems')
                        ->where('purchaseid',$purchaseid)
                        ->get();
        
        foreach ($purchasedlist as  $value) {
            DB::table('pharmacyinventories')
                ->where('mid', $value->mid)
                ->where('pid', session("Pharmacyid"))
                ->decrement('unit',$value->quantity);
        }

        //Pharmacy Tax Update
        $purchaseinfo = DB::table('purchases')->where('id', $purchaseid)->first();
        $netammountx = (float)$purchaseinfo->netammount;
        $tax = (float)($netammountx*5)/100;
        $taxammount = number_format((float)$tax, 2, '.', '');

        DB::table('pharmacytax')
            ->where('pid', $purchaseinfo->pharmacyid)
            ->increment('ammount', $taxammount);

        //PDF
     	$purchasedata = DB::table('purchases')->where('id',$purchaseid)->first();
     	$itemdata     = DB::table('purchaseitems')
                        ->join('medicines','medicines.id','=','purchaseitems.mid')
                        ->where('purchaseitems.purchaseid',$purchaseid)
                        ->where('medicines.status',"Listed")
                        ->get();
     	$pharmacydata = DB::table('pharmacies')->where('id',session('Pharmacyid'))->first();
 
     	$pdf = PDF::loadView('pharmacyhome/notes_pdf', compact('purchasedata', 'itemdata', 'pharmacydata'));
   
     	return $pdf->download($purchaseid.'.pdf');     
    }

    public function purchaselist(){
    	$purchaselist = DB::table('purchases')
    					->where('pharmacyid',session('Pharmacyid'))
    					->orderBy('date','DESC')
    					->orderBy('time','DESC')
    					->get();
    	return view('pharmacyhome.purchaselist',['purchaselist'=>$purchaselist]);
    }

    public function purchasedetails($purchaseid){
    	$purchase = DB::table('purchases')
    				->where('id',$purchaseid)
    				->where('pharmacyid',session('Pharmacyid'))
    				->first();
    	$items = DB::table('purchaseitems')
                    ->join('medicines', 'medicines.id', '=', 'purchaseitems.mid')
                    ->join('types', 'medicines.typeid', '=', 'types.id')
	    	        ->where('purchaseid',$purchaseid)
                    ->select('purchaseitems.*', 'medicines.*', 'types.name as tname')
	    	        ->get();
    	return view('pharmacyhome.purchasedetails',['purchase'=>$purchase, 'items'=>$items]);
    }

    public function purchasesearch(Request $request)
    {
        $term=$request->term;
        $data = DB::table('pharmacyinventories')
            ->join('medicines', 'medicines.id', '=', 'pharmacyinventories.mid')
            ->join('types', 'medicines.typeid', '=', 'types.id')
            ->where('medicines.name','like', '' . $term . '%')
            ->where('medicines.status',"Listed")
            ->where('pharmacyinventories.pid',session("Pharmacyid"))
            ->orderBy('medicines.name')
            ->select('pharmacyinventories.*', 'medicines.*', 'medicines.id as mid', 'types.name as tname')
            ->take(5)
            ->get();
        $results=array();
        foreach($data as $key => $v)
        {
            $results[]=['id'=>$v->mid, 'mrp'=>$v->mrp, 'unit'=>$v->unit, 'value'=>$v->name."(".$v->mg."mg): ".$v->tname];
        }
        return response()->json($results);
    }

    public function itemsearch(Request $req){
        if($req->search){
            $contactno = (int)$req->search;
            $data = DB::table('purchases')
            ->where('cuscontactno',$contactno)
            ->where('pharmacyid',session('Pharmacyid'))
            ->orderBy('date','DESC')
            ->orderBy('time','DESC')
            ->get();
                
            if($data){
                foreach($data as $value => $search){
                    echo '<tr> <td>' . $search->id . '</td>
                               <td>' . $search->cuscontactno . '</td>
                               <td>' . $search->date . '</td>
                               <td>' . $search->time . '</td>
                               <td>' . $search->total . '</td>
                               <td>' . $search->discount . '</td>
                               <td>' . $search->netammount . '</td>
                               <td>
                                   <a id="details" href="/pharmacypurchase/details/' . $search->id . '">Details</a>
                               </td>
                            <tr>';
                }
            }
        }
    }
}
