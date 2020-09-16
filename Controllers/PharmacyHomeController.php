<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacyHomeController extends Controller
{
    public function index(){
    	return view('pharmacyhome.index');
    }	
}
