<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\PharmacySettingsRequest;
use App\http\Requests\PharmacyChangePasswordRequest;
use Illuminate\Support\Facades\DB;

class PharmacySettingsController extends Controller
{
    public function information(){
    	$pharmacy = DB::table('pharmacies')->where('Id',session('pharmacyId'))->first();
        //session()->put('lastname', $pharmacy-$pharmacyLastname);
    	return $pharmacy;
    }

    public function passwordchange(){
        return view('pharmacyhome.pharmacypasswordchange',['pharmacy'=>$this->information()]);
    }

    public function updatepassword(PharmacyChangePasswordRequest $req){

        if(DB::table('pharmacies')
            ->where('Id', $req->pharmacyid)
            ->where('Password', $req->pharmacyOldPassword)
            ->update(['Password' => $req->pharmacyNewPassword])
            )
        {
            return view('pharmacyhome.index');
        }
        else
        {
            $req->session()->flash('msg', 'Current Password Didnot match');
            return redirect()->route('pharmacysetiings.changepassword');
        }
    }
}
