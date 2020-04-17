<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacyOrderController extends Controller
{

	public function company(){
        $company = DB::table('companies')->orderBy('Name', 'asc')->get();
        return $company;
    }
    
	public function index(){
    	return view('pharmacyhome.orderforsupply',['company'=>$this->company(),'medicine'=> (object) array()]);
    }

    public function search(Request $req){
		if($req->search){
		$id = (int)$req->search;
		$data = DB::table('medicines')
		->where('cid',$id)
		->orderBy('name')
		->get();
		
			if($data){
				foreach($data as $value => $search){
					$id = $search->id;
					$price = $search->price;
					echo '<tr id="tr'.$search->id.'">
					           <td onmouseover="show(tooltip1,'.$search->id.')" onmouseout="hide(tooltip1)">'. $search->name . '</td>
					           <td><input type="text"  style="border:none" readonly id="tdp'.$search->id.'" value="' . $search->price . '"></td>
					           <td>
					           	    <input type="button" value="+" id="'.$search->id.'" onclick="javascript:inc('.$search->id.');" >
					           </td>
					           <td><input type="text"  style="border:none" readonly id="tdq'.$search->id.'" value="0"></td>	
					           <td>
					           	    <input type="button" value="-" id="'.$search->id.'" onclick="javascript:dec('.$search->id.');" >
					           </td>
					           <td><input type="text"  style="border:none" readonly id="t'.$search->id.'" value="0"></td>			           
					      </tr>';
				}
			}
		}
	}
	public function meddetails(Request $req){
		if($req->search){
		$id = (int)$req->search;
		$data = DB::table('medicines')
		->where('id',$id)
		->first();
			if($data){
				$v = "Name  ".$data->name.
				     "  Price  ".$data->price;
				return $v;
			}
		}
	}
}
