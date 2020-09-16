<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;

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
	    ->join('generics', 'generics.id', '=', 'medicines.genericid')
	    ->join('types', 'types.id', '=', 'medicines.typeid')
	    ->where('medicines.cid',$id)
	    ->where('medicines.status',"Listed")
		->orderBy('medicines.name')
		->select('medicines.*', 'generics.name as gname','types.name as tname')
	    ->get();

		
			if($data){
				$i = 0;
				foreach($data as $value => $search){
					$id = $search->id;
					$price = $search->price;
					echo '<tr id="tr'.$search->id.'">
					           <td style="display:none;"><input type="hide" name="j" value="' . $i . '"></td>
							   <td style="display:none;"><input type="hide" name="mid'.$i.'" value="' . $search->id . '"></td>   
					           <td id="td'.$search->id.'" onmouseover="show(tooltip1,'.$search->id.')" style=" max-width: 250px">
					           		<input type="text" name="m'.$i.'" value="' . $search->name . '"
					           		style="border:none;background-color: #f2f2f2; width:250px" readonly>		
					           </td>
					           <td onmouseover="hide(tooltip1)">' . $search->gname . '</td>
					           <td onmouseover="hide(tooltip1)">' . $search->tname . '</td>
					           <td onmouseover="hide(tooltip1)">' . $search->mg . '</td>
					           <td onmouseover="hide(tooltip1)" style=" max-width: 65px">
					                <input type="text" name="p'.$i.'" value="' . $search->price . 'Tk" 
					           		style="border:none;background-color: #f2f2f2; width:65px" readonly id="tdp'.$search->id.'" >
					           </td>
					           <td onmouseover="hide(tooltip1)">
					           	    <input type="button" value="+" id="'.$search->id.'" 
					           	    onclick="javascript:inc('.$search->id.');"  
					           	    style="background-color: #4CAF50; color: white; text-align: center;">
					           </td>
					           <td onmouseover="hide(tooltip1)" style="max-width: 30px">
					               <input type="text" name="q'.$i.'"  readonly id="tdq'.$search->id.'" value="0"
					               style="border:none;background-color: #f2f2f2; width:30px" >
					           </td>	
					           <td onmouseover="hide(tooltip1)">
					           	    <input type="button" value="-" id="'.$search->id.'" 
					           	    onclick="javascript:dec('.$search->id.');" style="background-color: #FF0000; color: white;">
					           </td>
					           <td onmouseover="hide(tooltip1)" style="max-width: 80px">
					              <input type="text" name="t'.$i.'" readonly id="t'.$search->id.'" value="0.00Tk" 
					           	   style="border:none;background-color: #f2f2f2; width:80px">
					           </td>			           
					      </tr>';
					$i++;
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
				echo '<font style="font-size:20px;">'.$data->name.'</font><br><font style="font-size:26px;">MRP:'
				     .$data->mrp.'Tk<br><br>More</font><br>'.$data->details;
			}
		}
	}
    
    public function processorder(Request $req){
    	$company = DB::table('companies')->where('id',$req->companyid)->first();
    	return view('pharmacyhome.processorder',['data'=>$req,'company'=>$company]);
    }

    public function proceedorder(Request $req){
    	$oid=DB::table('orders')->insertGetId(
          ['pid' => session('Pharmacyid'), 'cid' => $req->cid, 'total' => (float)$req->total, 
           'placeddate' => date('Y-m-d'), 'time' => Carbon::now('Asia/Dhaka'), 'status' => "Pending"]
        );

        for($i=0; $i<count($req->q); $i++)
		{
			DB::table('ordercarts')->insertGetId(
	          ['mid' => $req->mid[$i] , 'oid' => $oid, 'quantity' => $req->q[$i], 'total' => (float)$req->t[$i]]
	        );
		}
		
       	return view('pharmacyhome.placedorder',['oid'=>$oid]);
    }

    public function orderlist(){
    	$orderlist = DB::table('orders')
    				->join('companies', 'companies.id', '=', 'orders.cid')
    				->where('pid',session('Pharmacyid'))
    				->orderBy('orders.placeddate','DESC')
    				->orderBy('time','DESC')
					->select('orders.*', 'companies.Name as cname')
    				->get();
    	return view('pharmacyhome.orderlist',['orderlist'=>$orderlist]);
    }

    public function orderdetails($oid){
    	$order = DB::table('orders')
    				->join('companies', 'companies.id', '=', 'orders.cid')
    				->where('orders.id',$oid)
    				->where('orders.pid',session('Pharmacyid'))
					->select('orders.*', 'companies.Name as cname')
    				->first();
    	$items = DB::table('ordercarts')
	    			->join('medicines', 'medicines.id', '=', 'ordercarts.mid')
	    			->join('types', 'medicines.typeid', '=', 'types.id')
	    	        ->where('ordercarts.oid',$oid)
	    	        ->select('ordercarts.*', 'medicines.name as mname','medicines.price as price',
	    	        	     'medicines.mg as mg', 'types.name as tname') 
	    	        ->get();
    	return view('pharmacyhome.orderdetails',['order'=>$order, 'items'=>$items]);
    }

    public function ordercancel($oid){
    	DB::table("ordercarts")->where('oid',$oid)->delete();
    	DB::table("orders")->delete($oid);
    	return redirect()->route('pharmacyorder.orderlist');
    }
}
