<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\CompanySettingsRequest;
use App\http\Requests\CompanyChangePasswordRequest;
use Illuminate\Support\Facades\DB;

class CompanySettingsController extends Controller
{
	public function information(){
    	$company = DB::table('companies')->where('Id',session('Companyid'))->first();
    	return $company;
    }
    public function passwordchange(){
        return view('companyhome.changepassword',['company'=>$this->information()]);
    }

    public function updatepassword(CompanyChangePasswordRequest $req){

        if(DB::table('companies')
            ->where('id', session('Companyid'))
            ->where('Password', $req->companyOldPassword)
            ->update(['Password' => $req->companyNewPassword])
            )
        {
            return view('companyhome.passwordchanged');
        }
        else
        {
            $req->session()->flash('msgcompass', 'Current Password Didnot Match');
            return redirect()->route('companysettings.changepassword');
        }
    }
}
