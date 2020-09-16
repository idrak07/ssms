<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PharmacyLogoutController extends Controller
{
    public function index(Request $req){
    	$req->session()->flush();
    	return redirect()->route('pharmacylogin.index');
    }
}
