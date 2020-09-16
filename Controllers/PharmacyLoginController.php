<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\PharmacyLoginRequest;
use Illuminate\Support\Facades\DB;

class PharmacyLoginController extends Controller
{
    public function index(){
    	return view('pharmacylogin.index');
    }

    public function login(PharmacyLoginRequest $req){
    	$pharmacy = DB::table('pharmacies')->where('UserName',$req->UserName)->where('Password',$req->Password)->first();
    	if(count((array)$pharmacy)>0){
            $req->session()->put('pharmacyId', $pharmacy->Id);
            $req->session()->put('userName', $pharmacy->UserName);
            
    		return redirect()->route('pharmacyhome.index');
    	}
    	else{
    		$req->session()->flash('msg', 'Invalid Email or Password');
    		return redirect()->route('pharmacylogin.index');
    	}
    }
}
