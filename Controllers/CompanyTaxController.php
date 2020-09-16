<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyTaxController extends Controller
{
    public function index(){
    	$taxinfo = DB::table('companytax')->where('cid',session('Companyid'))->first();
    	return view('companyhome.tax',['taxinfo'=>$taxinfo]);
    }
}
