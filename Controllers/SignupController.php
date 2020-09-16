<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SignupController extends Controller
{
    //

    public function getPharmacySignup(){


    	return view('sign-up.pharmacy');

    }

    public function getManufacturerSignup(){


    	return view('sign-up.manufacturer');

    }
    public function postPharmacySignup(Request $req){


    	DB::table('newpharmacyrequests')->insert([
    		'licenseNo' => $req->licenseNo,
    		'password' => $req->password,
    		'pharmacyName' => $req->pharmacyName,
    		'districtName' => $req->districtName,
    		'upazilaName' => $req->upazilaName,
    		'pharmacyType' => $req->pharmacyType,
    		'regNo' => $req->regNo,
    		'pharmacistName' => $req->pharmacistName,
    		'proprietorName' => $req->proprietorName,
    		'nid' => $req->nid,
    		'address' => $req->address,
    		'status' => 0,
    		'presentstatus' => 'Requested',
    		'Contactno' => $req->contactNo
    	]);
    	
    	return view('sign-up.message');

    }
    public function postManufacturerSignup(Request $req){


    	DB::table('newmanufacturerrequests')->insert([
    		'licenseNo' => $req->licenseNo,
    		'password' => $req->password,
    		'manufacturerName' => $req->manufacturerName,
    		'districtName' => $req->districtName,
    		'manufacturerType' => $req->manufacturerType,
    		'regNo' => $req->regNo,
    		'addresslocation' => $req->addresslocation,
    		'status' => 0,
    		'presentstatus' => 'Requested',
    		'contactNo' => $req->contactNo
    	]);
    	
    	return view('sign-up.message');

    }
    	
}


