<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Requests\CompanyInventoryRequest;

class CompanyInventoryController extends Controller
{
    public function index(){
    	$inventorylist = DB::table('companyinventories')
    				->join('medicines', 'medicines.id', '=', 'companyinventories.mid')
    				->where('companyinventories.cid',session('Companyid'))
                    ->where(function($query) {
                            $query->where('medicines.status', 'Listed')
                                ->orWhere('medicines.status', 'hidden');
                            })
    				->orderBy('medicines.name')
					->select('companyinventories.*', 'medicines.name as mname')
    				->get();
    	return view('companyhome.companyinventory',['inventorylist'=>$inventorylist]);
    }

    public function addnewbatch(){
    	return view('companyhome.companyinventoryupdate');
    }

    public function addnewbatchfinal(CompanyInventoryRequest $req){
        if($req->id){
            if(count(DB::table('companyinventories')->where('cid',session("Companyid"))->where('batchno',$req->batch)->first())>0){
                $req->session()->flash('msg2', 'Batchno already been used');
                return view('companyhome.companyinventoryupdate');
            }
            else{
                DB::table('companyinventories')->insertGetId(
                  ['mid' => $req->id, 'cid' => session("Companyid"), 'batchno' => $req->batch, 
                   'quantitybox' => $req->box]
                );
                return redirect()->route('companyinventory.index');
            }
        }
        else{
            $req->session()->flash('msg3', 'Not a Valid Product');
            return view('companyhome.companyinventoryupdate');
        }
    }
    
    public function updatesearch(Request $request)
    {
        $term=$request->term;
        $data = DB::table('medicines')
            ->join('types', 'medicines.typeid', '=', 'types.id')
    		->where('medicines.name','like', '' . $term . '%')
            ->where(function($query) {
                            $query->where('medicines.status', 'Listed')
                                ->orWhere('medicines.status', 'hidden');
                            })
    		->where('medicines.cid',session("Companyid"))
    		->orderBy('medicines.name')
            ->select('medicines.*','types.name as tname')
    		->take(5)
        	->get();
        $results=array();
        foreach($data as $key => $v)
        {
            $results[]=['id'=>$v->id, 'value'=>$v->name."(".$v->mg."mg): ".$v->tname];
        }
        return response()->json($results);
    }

    public function delete($id){
        DB::table("companyinventories")->delete($id);
        return redirect()->back();
    }

    public function itemsearch(Request $req){
        $data = DB::table('companyinventories')
        ->join('medicines', 'medicines.id', '=', 'companyinventories.mid')
        ->where('medicines.name','like',''.$req->search . '%')
        ->where('companyinventories.cid',session('Companyid'))
        ->orderBy('medicines.name')
        ->select('companyinventories.*','companyinventories.status as s','companyinventories.id as invid', 'medicines.*')
        ->get();
            
        if($data){
            foreach($data as $value => $search){
                echo '<tr> <td>' . $search->name . '</td>
                           <td>' . $search->batchno . '</td>
                           <td>' . $search->quantitybox . '</td>
                           <td>';
                               if($search->s == "Used")
                                echo "Assigned";
                               if($search->s == "")
                                echo '<a id="trash" onclick="return confirm(Are you sure?)" 
                                href="/companyinventory/delete/' . $search->invid . '">Delete</a>';
                               echo'</td>
                      </tr>';
            }
        }
    }
}
