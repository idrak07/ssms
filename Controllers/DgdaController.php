<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DgdaController extends Controller
{
    public function index(){
    	return view("dgda.index");
    }
    public function getBackground(){
    	return view("dgda.about.backgroundIndex");
    }
    public function getBiography(){
    	return view("dgda.about.biography");
    }
    public function getpharmacies(){
    	return redirect('/dgda/pharmacies/allopathicRetailPharmacyView/1-100');
    }

    public function SearchPharmacies(Request $req)
    {
        if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy=count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->get());
            return redirect('/dgda/pharmacies/allopathicRetailPharmacyProfile/'.$req->licenseNo);
            //return $pharmacy;
        }
        else if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {

            return redirect('/dgda/pharmacies/ayurvedicRetailPharmacyProfile/'.$req->licenseNo);
        }
        else if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {

            return redirect('/dgda/pharmacies/unaniRetailPharmacyProfile/'.$req->licenseNo);
        }
        else if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {

            return redirect('/dgda/pharmacies/herbalRetailPharmacyProfile/'.$req->licenseNo);
        }
        else if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {

            return redirect('/dgda/pharmacies/homeopathicRetailPharmacyProfile/'.$req->licenseNo);
        }
        else{
            $message="Invalid License No";
             return view('dgda.pharmacies.notFound',['message',$message]);
        } 
           
    }


    ///////////////////////////////////////////////Pharmacy Lists////////////////////////////////////////////


    public function allopathicRetailPharmacyView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$pharmacies=DB::table('allopathicpharmacies')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$pharmacies=DB::table('allopathicpharmacies')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $pharmacies;
    	return view('dgda.pharmacies.allopathicRetailPharmacyView' ,['pharmacies' => $pharmacies]);
    }
    public function ayurvedicRetailPharmacyView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$pharmacies=DB::table('ayurvedicpharmacies')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$pharmacies=DB::table('ayurvedicpharmacies')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $pharmacies;
    	return view('dgda.pharmacies.ayurvedicRetailPharmacyView' ,['pharmacies' => $pharmacies]);
    }
    public function unaniRetailPharmacyView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$pharmacies=DB::table('unanipharmacies')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$pharmacies=DB::table('unanipharmacies')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $pharmacies;
    	return view('dgda.pharmacies.unaniRetailPharmacyView' ,['pharmacies' => $pharmacies]);
    }
    public function herbalRetailPharmacyView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$pharmacies=DB::table('herbalpharmacies')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$pharmacies=DB::table('herbalpharmacies')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $pharmacies;
    	return view('dgda.pharmacies.herbalRetailPharmacyView' ,['pharmacies' => $pharmacies]);
    }
    public function homeopathicRetailPharmacyView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$pharmacies=DB::table('homeopathicpharmacies')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$pharmacies=DB::table('homeopathicpharmacies')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $pharmacies;
    	return view('dgda.pharmacies.homeopathicRetailPharmacyView' ,['pharmacies' => $pharmacies]);
    }

    /////////////////////////////////////////////Pharmacy Profiles//////////////////////////////////////////
    
    public function allopathicRetailPharmacyProfile(Request $req){

    	if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
    	{
    		$pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
    		// return $pharmacy;
    		return view('dgda.pharmacies.allopathicRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
    	}
    	else
    		return "False License No ";
    }
    public function ayurvedicRetailPharmacyProfile(Request $req){

        if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
            // return $pharmacy;
            return view('dgda.pharmacies.ayurvedicRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
        }
        else
            return "False License No ";
    }
    public function unaniRetailPharmacyProfile(Request $req){

        if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
            // return $pharmacy;
            return view('dgda.pharmacies.unaniRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
        }
        else
            return "False License No ";
    }
    public function herbalRetailPharmacyProfile(Request $req){

        if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
            // return $pharmacy;
            return view('dgda.pharmacies.herbalRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
        }
        else
            return "False License No ";
    }
    public function homeopathicRetailPharmacyProfile(Request $req){

        if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
            // return $pharmacy;
            return view('dgda.pharmacies.homeopathicRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
        }
        else
            return "False License No ";
    }
    ///////////////////////////////////////////////Action///////////////////////////////////////

    public function allopathicRetailPharmacyProfileAction(Request $req){

        if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Ban";
            $pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
            if($pharmacy->status==1)
            {
                $buttonText="Unban";
            }
            else
            {

            }
            // return $pharmacy;
            return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }

    public function ayurvedicRetailPharmacyProfileAction(Request $req){

        if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Ban";
            $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
            if($pharmacy->status==1)
            {
                $buttonText="Unban";
            }
            else
            {

            }
            // return $pharmacy;
            return view('dgda.pharmacies.ayurvedicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }

    public function unaniRetailPharmacyProfileAction(Request $req){

        if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Ban";
            $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
            if($pharmacy->status==1)
            {
                $buttonText="Unban";
            }
            else
            {

            }
            // return $pharmacy;
            return view('dgda.pharmacies.unaniRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }

    public function herbalRetailPharmacyProfileAction(Request $req){

        if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Ban";
            $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
            if($pharmacy->status==1)
            {
                $buttonText="Unban";
            }
            else
            {

            }
            // return $pharmacy;
            return view('dgda.pharmacies.herbalRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }

    public function homeopathicRetailPharmacyProfileAction(Request $req){

        if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Ban";
            $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
            if($pharmacy->status==1)
            {
                $buttonText="Unban";
            }
            else
            {

            }
            // return $pharmacy;
            return view('dgda.pharmacies.homeopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }


    ///////////////////////////////////information Update////////////////////



    public function allopathicRetailPharmacyProfileActionUpdate(Request $req){
        if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                 DB::table('allopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['pharmacyName' => $req->pharmacyName]);
                DB::table('allopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['districtName' => $req->districtName]);
                DB::table('allopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['upazilaName' => $req->upazilaName]);
                DB::table('allopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['newLicense' => $req->newLicense]);
                DB::table('allopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['dateOfRenewal' => $req->dateOfRenewal]);
                DB::table('allopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['validUpto' => $req->validUpto]);


                return redirect('/dgda/pharmacies/allopathicRetailPharmacyView/1-100');                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";   
    }

    public function ayurvedicRetailPharmacyProfileActionUpdate(Request $req){
        if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                DB::table('ayurvedicpharmacies')->where('licenseNo', $req->licenseNo)->update(['pharmacyName' => $req->pharmacyName]);
                DB::table('ayurvedicpharmacies')->where('licenseNo', $req->licenseNo)->update(['districtName' => $req->districtName]);
                DB::table('ayurvedicpharmacies')->where('licenseNo', $req->licenseNo)->update(['upazilaName' => $req->upazilaName]);
                DB::table('ayurvedicpharmacies')->where('licenseNo', $req->licenseNo)->update(['newLicense' => $req->newLicense]);
                DB::table('ayurvedicpharmacies')->where('licenseNo', $req->licenseNo)->update(['dateOfRenewal' => $req->dateOfRenewal]);
                DB::table('ayurvedicpharmacies')->where('licenseNo', $req->licenseNo)->update(['validUpto' => $req->validUpto]);
                return redirect('/dgda/pharmacies/ayurvedicRetailPharmacyView/1-100');                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";   
    }

    public function unaniRetailPharmacyProfileActionUpdate(Request $req){
        if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                DB::table('unanipharmacies')->where('licenseNo', $req->licenseNo)->update(['pharmacyName' => $req->pharmacyName]);
                DB::table('unanipharmacies')->where('licenseNo', $req->licenseNo)->update(['districtName' => $req->districtName]);
                DB::table('unanipharmacies')->where('licenseNo', $req->licenseNo)->update(['upazilaName' => $req->upazilaName]);
                DB::table('unanipharmacies')->where('licenseNo', $req->licenseNo)->update(['newLicense' => $req->newLicense]);
                DB::table('unanipharmacies')->where('licenseNo', $req->licenseNo)->update(['dateOfRenewal' => $req->dateOfRenewal]);
                DB::table('unanipharmacies')->where('licenseNo', $req->licenseNo)->update(['validUpto' => $req->validUpto]);


                return redirect('/dgda/pharmacies/unaniRetailPharmacyView/1-100');                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";   
    }

    public function herbalRetailPharmacyProfileActionUpdate(Request $req){
        if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                DB::table('herbalpharmacies')->where('licenseNo', $req->licenseNo)->update(['pharmacyName' => $req->pharmacyName]);
                DB::table('herbalpharmacies')->where('licenseNo', $req->licenseNo)->update(['districtName' => $req->districtName]);
                DB::table('herbalpharmacies')->where('licenseNo', $req->licenseNo)->update(['upazilaName' => $req->upazilaName]);
                DB::table('herbalpharmacies')->where('licenseNo', $req->licenseNo)->update(['newLicense' => $req->newLicense]);
                DB::table('herbalpharmacies')->where('licenseNo', $req->licenseNo)->update(['dateOfRenewal' => $req->dateOfRenewal]);
                DB::table('herbalpharmacies')->where('licenseNo', $req->licenseNo)->update(['validUpto' => $req->validUpto]);
                return redirect('/dgda/pharmacies/herbalRetailPharmacyView/1-100');                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";   
    }

    public function homeopathicRetailPharmacyProfileActionUpdate(Request $req){
        if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                DB::table('homeopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['pharmacyName' => $req->pharmacyName]);
                DB::table('homeopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['districtName' => $req->districtName]);
                DB::table('homeopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['upazilaName' => $req->upazilaName]);
                DB::table('homeopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['newLicense' => $req->newLicense]);
                DB::table('homeopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['dateOfRenewal' => $req->dateOfRenewal]);
                DB::table('homeopathicpharmacies')->where('licenseNo', $req->licenseNo)->update(['validUpto' => $req->validUpto]);
                
                return redirect('/dgda/pharmacies/homeopathicRetailPharmacyView/1-100');                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";   
    }


    /////////////////////////////////////////Ban////////////////////////////////////////////////

    public function allopathicRetailPharmacyban(Request $req){

            if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('allopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['status' => 1]);
                return redirect('/dgda/pharmacies/allopathicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function ayurvedicRetailPharmacyban(Request $req){

            if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('ayurvedicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['status' => 1]);
                return redirect('/dgda/pharmacies/ayurvedicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function unaniRetailPharmacyban(Request $req){

            if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('unanipharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['status' => 1]);
                return redirect('/dgda/pharmacies/unaniRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function herbalRetailPharmacyban(Request $req){

            if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('herbalpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['status' => 1]);
                return redirect('/dgda/pharmacies/herbalRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function homeopathicRetailPharmacyban(Request $req){

            if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('homeopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['status' => 1]);
                return redirect('/dgda/pharmacies/homeopathicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }



        //////////////////////////////////////////////////un Ban//////////////////////////////////


    public function allopathicRetailPharmacyUnban(Request $req){

                if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('allopathicpharmacies')
                                          ->where('licenseNo', $req->licenseNo)
                                          ->update(['status' => 0]);
                    return redirect('/dgda/pharmacies/allopathicRetailPharmacyProfile/'.$req->licenseNo);                    
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
            }
    public function ayurvedicRetailPharmacyUnban(Request $req){

                if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('ayurvedicpharmacies')
                                          ->where('licenseNo', $req->licenseNo)
                                          ->update(['status' => 0]);
                    // return $affected;                    
                    // return $pharmacy;
                    return redirect('/dgda/pharmacies/ayurvedicRetailPharmacyProfile/'.$req->licenseNo);
                }
                else
                    return "False License No ";
            }
    public function unaniRetailPharmacyUnban(Request $req){

                if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('unanipharmacies')
                                          ->where('licenseNo', $req->licenseNo)
                                          ->update(['status' => 0]);
                    return redirect('/dgda/pharmacies/unaniRetailPharmacyProfile/'.$req->licenseNo);                   
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
            }
    public function herbalRetailPharmacyUnban(Request $req){

                if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('herbalpharmacies')
                                          ->where('licenseNo', $req->licenseNo)
                                          ->update(['status' => 0]);
                    return redirect('/dgda/pharmacies/herbalRetailPharmacyProfile/'.$req->licenseNo);                    
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
            }
    public function homeopathicRetailPharmacyUnban(Request $req){

                if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('homeopathicpharmacies')
                                          ->where('licenseNo', $req->licenseNo)
                                          ->update(['status' => 0]);
                    return redirect('/dgda/pharmacies/homeopathicRetailPharmacyProfile/'.$req->licenseNo);                   
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
            }
    

            //////////////////////////////////////////////////////////////////////////////////////////
    public function newPharmacyReq(){

    	$pharmacies=DB::table('newpharmacyrequests')->get();
        return view('dgda.pharmacies.newRequests',['pharmacies'=>$pharmacies]);

    }
    public function viewPharmacyReq(Request $req){

                if(count((array)DB::table('newpharmacyrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('newpharmacyrequests')->where('licenseNo',$req->licenseNo)->first();

                    return view('dgda.pharmacies.newRequestsProfile',['pharmacy'=>$pharmacy]);   
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";

    }

    public function forwardToNBR(Request $req){

                if(count((array)DB::table('newpharmacyrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    DB::table('newpharmacyrequests')->where('licenseNo', $req->licenseNo)->update(['status' => 2]);
                    DB::table('newpharmacyrequests')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => 'Waiting For NBR Confirm']);
                    return redirect('/dgda/pharmacies/requests/'.$req->licenseNo);                   
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
    }
    public function confirmPharmacyReq(Request $req){

                if(count((array)DB::table('newpharmacyrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    DB::table('newpharmacyrequests')->where('licenseNo', $req->licenseNo)->update(['status' => 4]);
                    DB::table('newpharmacyrequests')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => 'Confirmed Verification']);
                    $pharmacy=DB::table('newpharmacyrequests')->where('licenseNo', $req->licenseNo)->first();
                    
                    if($pharmacy->pharmacyType == 1)
                    {
                        $sl=DB::table('allopathicpharmacies')->max('sl');
                        DB::table('allopathicpharmacies')->insert([
                            'sl'=> $sl,
                            'licenseNo'=> $pharmacy->licenseNo,
                            'districtName' => $pharmacy->districtName,
                            'upazilaName' => $pharmacy->upazilaName,
                            'pharmacyName' => $pharmacy->pharmacyName,
                            'password' => $pharmacy->password,
                            'validUpto' => '2030-10-10',
                            'status' => 0,
                            'taxStatus' => 0,
                            'payAbleTax' => 0
                        ]);
                    }
                    else if($pharmacy->pharmacyType == 2)
                    {
                        $sl=DB::table('ayurvedicpharmacies')->max('sl');
                        DB::table('ayurvedicpharmacies')->insert([

                            'licenseNo'=> $pharmacy->licenseNo,
                            'districtName' => $pharmacy->districtName,
                            'upazilaName' => $pharmacy->upazilaName,
                            'pharmacyName' => $pharmacy->pharmacyName,
                            'password' => $pharmacy->password,
                            'validUpto' => '2030-10-10',
                            'status' => 0,
                            'taxStatus' => 0,
                            'payAbleTax' => 0
                        ]);
                    }
                    else if($pharmacy->pharmacyType == 3)
                    {
                        $sl=DB::table('unanipharmacies')->max('sl');
                        DB::table('unanipharmacies')->insert([
                            'licenseNo'=> $pharmacy->licenseNo,
                            'districtName' => $pharmacy->districtName,
                            'upazilaName' => $pharmacy->upazilaName,
                            'pharmacyName' => $pharmacy->pharmacyName,
                            'password' => $pharmacy->password,
                            'validUpto' => '2030-10-10',
                            'status' => 0,
                            'taxStatus' => 0,
                            'payAbleTax' => 0
                        ]);
                    }
                    else if($pharmacy->pharmacyType == 4)
                    {
                        $sl=DB::table('herbalpharmacies')->max('sl');
                        DB::table('herbalpharmacies')->insert([
                            'licenseNo'=> $pharmacy->licenseNo,
                            'districtName' => $pharmacy->districtName,
                            'upazilaName' => $pharmacy->upazilaName,
                            'pharmacyName' => $pharmacy->pharmacyName,
                            'contactNo' => $pharmacy->contactNo,
                            'password' => $pharmacy->password,
                            'validUpto' => '2030-10-10',
                            'status' => 0,
                            'taxStatus' => 0,
                            'payAbleTax' => 0
                        ]);
                    }
                    else if($pharmacy->pharmacyType==5)
                    {
                        $sl=DB::table('homeopathicpharmacies')->max('sl');
                        DB::table('homeopathicpharmacies')->insert([
                            'licenseNo'=> $pharmacy->licenseNo,
                            'districtName' => $pharmacy->districtName,
                            'upazilaName' => $pharmacy->upazilaName,
                            'pharmacyName' => $pharmacy->pharmacyName,
                            'password' => $pharmacy->password,
                            'validUpto' => '2030-10-10',
                            'status' => 0,
                            'taxStatus' => 0,
                            'payAbleTax' => 0
                        ]);
                    }
                    else
                    {
                        return "Something Went Wrong ";
                        
                    }
                    DB::table('pharmacies')->insert([
                        'UserName' => $pharmacy->pharmacyName,
                        'password' => $pharmacy->password,
                        'district' => $pharmacy->districtName,
                        'Contactno' => $pharmacy->contactNo
                    ]);
                    return redirect('/dgda/pharmacies/requests/'.$req->licenseNo);                   
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                
                }
                else
                    return "False License No ";

        
        
    }
    public function cancelPharmacyReq(Request $req){

                if(count((array)DB::table('newpharmacyrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    DB::table('newpharmacyrequests')->where('licenseNo', $req->licenseNo)->update(['status' => 1]);
                    DB::table('newpharmacyrequests')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => 'Cancelled Verification']);
                    return redirect('/dgda/pharmacies/requests/'.$req->licenseNo);                   
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
    }
    
    
}
