<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyOrderController extends Controller
{
    public function orderdetails($orderid){
    	$order = DB::table('orders')
    				->join('pharmacies', 'pharmacies.id', '=', 'orders.pid')
    				->where('orders.id',$orderid)
    				->where('orders.cid',session('Companyid'))
					->select('orders.*', 'pharmacies.UserName as pname',
                                    'pharmacies.marketname as market', 'pharmacies.road as road',
                                    'pharmacies.district as district', 'pharmacies.Contactno as contact')
    				->first();
    	$items = DB::table('ordercarts')
	    			->join('medicines', 'medicines.id', '=', 'ordercarts.mid')
                    ->where('medicines.status',"Listed")
	    	        ->where('oid',$orderid)
	    	        ->select('ordercarts.*', 'medicines.name as mname' , 'medicines.id as mid' ,'medicines.price as price')
	    	        ->get();
        $batchitems = DB::table('companyinventories')
                     ->join('ordercarts', 'ordercarts.mid', '=', 'companyinventories.mid')
                     ->where('companyinventories.cid',session('Companyid'))
                     ->where('ordercarts.oid',$orderid)
                     ->whereRaw('companyinventories.quantitybox >= ordercarts.quantity')
                     ->select('companyinventories.*')
                     ->get();
    	return view('companyhome.pendingorderdetails',['order'=>$order, 'items'=>$items, 'batchitems'=>$batchitems]);
    }

    public function orderconfirm($orderid,Request $req){
        for($i=0; $i<count($req->batchid); $i++){
            if($req->batchid[$i] == "Select Batch")
            {
                $req->session()->flash('msg', 'Select a Valid Batchno For Every Item');
                return $this->orderdetails($orderid);
            }
        }
        DB::table('orders')
            ->where('id', $orderid)
            ->update(['status' => "Delivered", 'deliverydate' => date('Y-m-d')]);

        for($i=0; $i<count($req->batchid); $i++){
            DB::table('ordercarts')
                ->where('oid', $orderid)
                ->where('mid', $req->mid[$i])
                ->update(['batchid' => $req->batchid[$i]]);
            DB::table('companyinventories')
                ->where('id', $req->batchid[$i])
                ->decrement('quantitybox', $req->q[$i]);
            DB::table('companyinventories')
                ->where('id', $req->batchid[$i])
                ->update(['status' => "Used"]);
        }
        return redirect()->route('companyhome.index');
    }

    public function deliveredorder(){
        $orderlist = DB::table('orders')
                    ->join('pharmacies', 'pharmacies.id', '=', 'orders.pid')
                    ->where('orders.cid',session('Companyid'))
                    ->where(function($query) {
                            $query->where('orders.status', 'Delivered')
                                ->orWhere('orders.status', 'Confirmed');
                            })
                    ->orderBy('orders.placeddate','DESC')
                    ->orderBy('time','DESC')
                    ->select('orders.*', 'pharmacies.UserName as pname', 'pharmacies.Contactno as pcontact')
                    ->get();
        return view('companyhome.deliveredorderlist',['orderlist'=>$orderlist]);
    }

    public function deliveredorderdetails($orderid){
        $order = DB::table('orders')
                    ->join('pharmacies', 'pharmacies.id', '=', 'orders.pid')
                    ->where('orders.id',$orderid)
                    ->where('orders.cid',session('Companyid'))
                    ->select('orders.*', 'pharmacies.UserName as pname','pharmacies.marketname as market','pharmacies.road as road',
                                         'pharmacies.district as district', 'pharmacies.Contactno as contact')
                    ->first();
        $items = DB::table('ordercarts')
                    ->join('medicines', 'medicines.id', '=', 'ordercarts.mid')
                    ->where('ordercarts.oid',$orderid)
                    ->select('ordercarts.*', 'medicines.name as mname' ,'medicines.price as price')
                    ->get();
        $batchitems = DB::table('companyinventories')
                     ->join('ordercarts', 'ordercarts.batchid', '=', 'companyinventories.id')
                     ->where('companyinventories.cid',session('Companyid'))
                     ->where('ordercarts.oid',$orderid)
                     ->select('companyinventories.*')
                     ->get();
        return view('companyhome.deliveredorderdetails',['order'=>$order, 'items'=>$items, 'batchitems'=>$batchitems]);
    }
}
