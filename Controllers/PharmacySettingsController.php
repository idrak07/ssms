<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\PharmacySettingsRequest;
use App\http\Requests\PharmacyChangePasswordRequest;
use Illuminate\Support\Facades\DB;

class PharmacySettingsController extends Controller
{
    public function information(){
    	$pharmacy = DB::table('pharmacies')->where('Id',session('Pharmacyid'))->first();
        session()->put('name', $pharmacy->UserName);
    	return $pharmacy;
    }

    public function passwordchange(){
        return view('pharmacyhome.pharmacypasswordchange',['pharmacy'=>$this->information()]);
    }

    public function updatepassword(PharmacyChangePasswordRequest $req){

        if(DB::table('pharmacies')
            ->where('Id', session('Pharmacyid'))
            ->where('Password', $req->pharmacyOldPassword)
            ->update(['Password' => $req->pharmacyNewPassword])
            )
        {
            return view('pharmacyhome.passwordchanged');
        }
        else
        {
            $req->session()->flash('msgpharpass', 'Current Password Didnot Match');
            return redirect()->route('pharmacysettings.changepassword');
        }
    }
}
