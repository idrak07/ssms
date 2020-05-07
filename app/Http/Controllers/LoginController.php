<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
    	return view('login.index');
    }

    public function login(Request $req){
    	if(count(DB::table('pharmacies')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first())>0){
    		$pharmacy = DB::table('pharmacies')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first();
            $req->session()->put('Pharmacyid', $pharmacy->Id);
            $req->session()->put('type', "pharmacy");
            $req->session()->put('pharmacyname', $pharmacy->UserName);
            
    		return redirect()->route('pharmacyhome.index');
    	}
    	elseif (count(DB::table('companies')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first())>0){
    		$company = DB::table('companies')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first();
            $req->session()->put('Companyid', $company->id);
            $req->session()->put('type', "company");
            $req->session()->put('companyname', $company->Name);
            
    		return redirect()->route('companyhome.index');
    	}
    	else{
    		$req->session()->flash('msg', 'Invalid Contact no or Password');
    		return redirect()->route('login.index');
    	}
    }
}
