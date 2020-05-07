<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyHomeController extends Controller
{
    public function index(){
    	$orderlist = DB::table('orders')
    				->join('pharmacies', 'pharmacies.id', '=', 'orders.pid')
    				->where('cid',session('Companyid'))
    				->where('status','Pending')
    				->orderBy('orders.placeddate','DESC')
    				->orderBy('time','DESC')
					->select('orders.*', 'pharmacies.UserName as pname', 'pharmacies.Contactno as pcontact')
    				->get();
    	return view('companyhome.index',['orderlist'=>$orderlist]);
    }

}
