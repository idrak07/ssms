<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacyTaxController extends Controller
{
    public function index(){
    	$taxinfo = DB::table('pharmacytax')->where('pid',session('Pharmacyid'))->first();
    	return view('pharmacyhome.tax',['taxinfo'=>$taxinfo]);
    }
}
