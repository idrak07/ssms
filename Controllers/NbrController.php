<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NbrController extends Controller
{
    //
    public function index()
    {
    	return view('nbr.index');
    }

    public function getpharmacies()
    {
    	return redirect('/nbr/dgda/pharmacies/allopathicRetailPharmacyView/1-100');
    }


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
    	return view('nbr.pharmacies.allopathicRetailPharmacyView' ,['pharmacies' => $pharmacies]);
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
    	return view('nbr.pharmacies.ayurvedicRetailPharmacyView' ,['pharmacies' => $pharmacies]);
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
    	return view('nbr.pharmacies.unaniRetailPharmacyView' ,['pharmacies' => $pharmacies]);
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
    	return view('nbr.pharmacies.herbalRetailPharmacyView' ,['pharmacies' => $pharmacies]);
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
    	return view('nbr.pharmacies.homeopathicRetailPharmacyView' ,['pharmacies' => $pharmacies]);
    }


    public function allopathicRetailPharmacyProfile(Request $req){

        if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
            // return $pharmacy;
            return view('nbr.pharmacies.allopathicRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
        }
        else
            return "False License No ";
    }
    public function ayurvedicRetailPharmacyProfile(Request $req){

        if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
            // return $pharmacy;
            return view('nbr.pharmacies.ayurvedicRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
        }
        else
            return "False License No ";
    }
    public function unaniRetailPharmacyProfile(Request $req){

        if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
            // return $pharmacy;
            return view('nbr.pharmacies.unaniRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
        }
        else
            return "False License No ";
    }
    public function herbalRetailPharmacyProfile(Request $req){

        if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
            // return $pharmacy;
            return view('nbr.pharmacies.herbalRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
        }
        else
            return "False License No ";
    }
    public function homeopathicRetailPharmacyProfile(Request $req){

        if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
            // return $pharmacy;
            return view('nbr.pharmacies.homeopathicRetailPharmacyProfile' ,['pharmacy' => $pharmacy]);
        }
        else
            return "False License No ";
    }




    /////////////////////////////////////////makeWarning////////////////////////////////////////////////

    public function allopathicRetailPharmacymakeWarning(Request $req){

            if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('allopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 2]);
                return redirect('/nbr/dgda/pharmacies/allopathicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function ayurvedicRetailPharmacymakeWarning(Request $req){

            if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('ayurvedicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 2]);
                return redirect('/nbr/dgda/pharmacies/ayurvedicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function unaniRetailPharmacymakeWarning(Request $req){

            if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('unanipharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 2]);
                return redirect('/nbr/dgda/pharmacies/unaniRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function herbalRetailPharmacymakeWarning(Request $req){

            if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('herbalpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 2]);
                return redirect('/nbr/dgda/pharmacies/herbalRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function homeopathicRetailPharmacymakeWarning(Request $req){

            if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('homeopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 2]);
                return redirect('/nbr/dgda/pharmacies/homeopathicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }




    /////////////////////////////////////////Suspend////////////////////////////////////////////////

    public function allopathicRetailPharmacysuspend(Request $req){

            if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                if($pharmacy->payAbleTax>10000)
                {
                    $affected = DB::table('allopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 5]);
                
                }
                else{
                    $req->session()->flash('messageForNBRprofiles', 'Sorry ! You cant Suspend this Pharmacy as His Payable tax is less then 10000/- BDT . Thank You.');
                }         
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                return redirect('/nbr/dgda/pharmacies/allopathicRetailPharmacyProfile/'.$pharmacy->licenseNo); 
            }
            else
                return "False License No ";
    }

    public function ayurvedicRetailPharmacysuspend(Request $req){

            if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                if($pharmacy->payAbleTax>10000)
                {
                    $affected = DB::table('ayurvedicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 5]);
                
                }
                else{
                    $req->session()->flash('messageForNBRprofiles', 'Sorry ! You cant Suspend this Pharmacy as His Payable tax is less then 10000/- BDT . Thank You.');
                }  
                return redirect('/nbr/dgda/pharmacies/ayurvedicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function unaniRetailPharmacysuspend(Request $req){

            if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
                if($pharmacy->payAbleTax>10000)
                {
                    $affected = DB::table('unanipharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 5]);
                
                }
                else{
                    $req->session()->flash('messageForNBRprofiles', 'Sorry ! You cant Suspend this Pharmacy as His Payable tax is less then 10000/- BDT . Thank You.');
                }
                return redirect('/nbr/dgda/pharmacies/unaniRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function herbalRetailPharmacysuspend(Request $req){

            if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
                if($pharmacy->payAbleTax>10000)
                {
                    $affected = DB::table('herbalpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 5]);
                
                }
                else{
                    $req->session()->flash('messageForNBRprofiles', 'Sorry ! You cant Suspend this Pharmacy as His Payable tax is less then 10000/- BDT . Thank You.');
                }
                return redirect('/nbr/dgda/pharmacies/herbalRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function homeopathicRetailPharmacysuspend(Request $req){

            if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                if($pharmacy->payAbleTax>10000)
                {
                    $affected = DB::table('homeopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 5]);
                
                }
                else{
                    $req->session()->flash('messageForNBRprofiles', 'Sorry ! You cant Suspend this Pharmacy as His Payable tax is less then 10000/- BDT . Thank You.');
                }
                return redirect('/nbr/dgda/pharmacies/homeopathicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }


    ///////////////////////////////////Clear////////////////////////////////////////////////////////


    public function allopathicRetailPharmacyClear(Request $req){

            if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();

                DB::table('pharmacyTaxTransictions')
                            ->insert([
                                'licenseNo'=>$pharmacy->licenseNo,
                                'transcDate'=> date("Y-m-d"),
                                'amount'=> $pharmacy->payAbleTax
                        ]);


                DB::table('allopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 0]);
                DB::table('allopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['payAbleTax' => 0]);
                $req->session()->flash('messageForNBRprofiles', 'Tax for this Pharmacy has been Cleared !');
                        
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                return redirect('/nbr/dgda/pharmacies/allopathicRetailPharmacyProfile/'.$pharmacy->licenseNo); 
            }
            else
                return "False License No ";
    }

    public function ayurvedicRetailPharmacyClear(Request $req){

            if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                DB::table('pharmacyTaxTransictions')
                            ->insert([
                                'licenseNo'=>$pharmacy->licenseNo,
                                'transcDate'=> date("Y-m-d"),
                                'amount'=> $pharmacy->payAbleTax
                        ]);


                DB::table('ayurvedicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 0]);
                DB::table('ayurvedicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['payAbleTax' => 0]);
                $req->session()->flash('messageForNBRprofiles', 'Tax for this Pharmacy has been Cleared !'); 
                return redirect('/nbr/dgda/pharmacies/ayurvedicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function unaniRetailPharmacyClear(Request $req){

            if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
                DB::table('pharmacyTaxTransictions')
                            ->insert([
                                'licenseNo'=>$pharmacy->licenseNo,
                                'transcDate'=> date("Y-m-d"),
                                'amount'=> $pharmacy->payAbleTax
                        ]);


                DB::table('unanipharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 0]);
                DB::table('unanipharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['payAbleTax' => 0]);
                $req->session()->flash('messageForNBRprofiles', 'Tax for this Pharmacy has been Cleared !'); 

                return redirect('/nbr/dgda/pharmacies/unaniRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function herbalRetailPharmacyClear(Request $req){

            if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
                DB::table('pharmacyTaxTransictions')
                            ->insert([
                                'licenseNo'=>$pharmacy->licenseNo,
                                'transcDate'=> date("Y-m-d"),
                                'amount'=> $pharmacy->payAbleTax
                        ]);


                DB::table('herbalpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 0]);
                DB::table('herbalpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['payAbleTax' => 0]);
                $req->session()->flash('messageForNBRprofiles', 'Tax for this Pharmacy has been Cleared !'); 

                return redirect('/nbr/dgda/pharmacies/herbalRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }

    public function homeopathicRetailPharmacyClear(Request $req){

            if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                DB::table('pharmacyTaxTransictions')
                            ->insert([
                                'licenseNo'=>$pharmacy->licenseNo,
                                'transcDate'=> date("Y-m-d"),
                                'amount'=> $pharmacy->payAbleTax
                        ]);


                DB::table('homeopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['taxStatus' => 0]);
                DB::table('homeopathicpharmacies')
                                      ->where('licenseNo', $req->licenseNo)
                                      ->update(['payAbleTax' => 0]);
                $req->session()->flash('messageForNBRprofiles', 'Tax for this Pharmacy has been Cleared !'); 
                return redirect('/nbr/dgda/pharmacies/homeopathicRetailPharmacyProfile/'.$pharmacy->licenseNo);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }


    public function allopathicRetailPharmacyTaxList(Request $req){

            if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
            {
                $pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                
                return view('nbr.pharmacies.allopathicRetailPharmacyTaxView',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
            }
            else
                return "False License No ";
    }
    public function ayurvedicRetailPharmacyTaxList(Request $req){

                if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                    $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                    
                    return view('nbr.pharmacies.ayurvedicRetailPharmacyTaxView',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
    }
    public function unaniRetailPharmacyTaxList(Request $req){

                if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
                    $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                    
                    return view('nbr.pharmacies.unaniRetailPharmacyTaxView',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
    }
    public function herbalRetailPharmacyTaxList(Request $req){

                if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
                    $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                    
                    return view('nbr.pharmacies.herbalRetailPharmacyTaxView',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
    }
    public function homeopathicRetailPharmacyTaxList(Request $req){

                if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                    $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                    
                    return view('nbr.pharmacies.homeopathicRetailPharmacyTaxView',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
    }






    //////////////////////////////////////////New Requests/////////////////////////////////////


    public function newPharmacyReq(){

        $pharmacies=DB::table('newpharmacyrequests')->where(['status'=>2])->get();
        return view('nbr.pharmacies.newRequests',['pharmacies'=>$pharmacies]);

    }

    public function viewPharmacyReq(Request $req){

                if(count((array)DB::table('newpharmacyrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $pharmacy= DB::table('newpharmacyrequests')->where('licenseNo',$req->licenseNo)->first();

                    return view('nbr.pharmacies.newRequestsProfile',['pharmacy'=>$pharmacy]);   
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";

    }

    public function forwardToDGDA(Request $req){

                if(count((array)DB::table('newpharmacyrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    DB::table('newpharmacyrequests')->where('licenseNo', $req->licenseNo)->update(['status' => 3]);
                    DB::table('newpharmacyrequests')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => ' NBR Confirmed']);
                    return redirect('/nbr/dgda/pharmacies/requests');                   
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
                    return redirect('/nbr/dgda/pharmacies/requests');                   
                    // return $pharmacy;
                    // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                }
                else
                    return "False License No ";
    }
    

}
