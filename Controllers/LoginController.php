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
    	if(count((array)DB::table('pharmacies')->where('contactno',$req->Contactno)->where('Password',$req->Password)->first())>0){
    		$pharmacy = DB::table('pharmacies')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first();
            $req->session()->put('Pharmacyid', $pharmacy->Id);
            $req->session()->put('type', "pharmacy");
            $req->session()->put('pharmacyname', $pharmacy->UserName);
            
    		return redirect()->route('pharmacyhome.index');
    	}
    	elseif (count((array)DB::table('companies')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first())>0){
    		$company = DB::table('companies')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first();
            $req->session()->put('Companyid', $company->id);
            $req->session()->put('type', "company");
            $req->session()->put('companyname', $company->Name);
            
    		return redirect()->route('companyhome.index');
    	}

        elseif (count((array)DB::table('dgdas')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first())>0){
            $dgda = DB::table('dgdas')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first();
            $req->session()->put('dgdaId', $dgda->id);
            $req->session()->put('type', "dgda");
            $req->session()->put('name', $dgda->Name);
            
            return redirect()->route('dgda.index');
        }
    	elseif (count((array)DB::table('nbrs')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first())>0){
            $nbr = DB::table('nbrs')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first();
            $req->session()->put('id', $nbr->id);
            $req->session()->put('type', "nbr");
            $req->session()->put('name', $nbr->Name);
            
            return redirect()->route('nbr.index');
        }
        elseif (count((array)DB::table('doctors')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first())>0){
            $doctor = DB::table('doctors')->where('Contactno',$req->Contactno)->where('Password',$req->Password)->first();
            $req->session()->put('id', $doctor->id);
            $req->session()->put('type', "doctor");
            $req->session()->put('name', $doctor->name);
            
            return redirect()->route('doctor.index');
        }
        
        else{
    		$req->session()->flash('msg', 'Invalid Contact no or Password');
    		return redirect()->route('login.index');
    	}
    }
}
