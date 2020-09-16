<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DgdaManufacturerController extends Controller
{
    //


    public function getManufacturers(){
    	return redirect('/dgda/manufacturers/allopathicManufacturerView/1-100');
    }


    ////////////////////////////////////////////////////////////////////////////manufacturer List//////////////////////////////


    public function allopathicManufacturerView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$manufacturers=DB::table('allopathicmanufacturers')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$manufacturers=DB::table('allopathicmanufacturers')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $manufacturers;
    	return view('dgda.manufacturers.allopathicManufacturerView' ,['manufacturers' => $manufacturers]);
    }
    public function ayurvedicManufacturerView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$manufacturers=DB::table('ayurvedicmanufacturers')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$manufacturers=DB::table('ayurvedicmanufacturers')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $manufacturers;
    	return view('dgda.manufacturers.ayurvedicManufacturerView' ,['manufacturers' => $manufacturers]);
    }
    public function unaniManufacturerView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$manufacturers=DB::table('unanimanufacturers')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$manufacturers=DB::table('unanimanufacturers')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $manufacturers;
    	return view('dgda.manufacturers.unaniManufacturerView' ,['manufacturers' => $manufacturers]);
    }
    public function herbalManufacturerView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$manufacturers=DB::table('herbalmanufacturers')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$manufacturers=DB::table('herbalmanufacturers')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $manufacturers;
    	return view('dgda.manufacturers.herbalManufacturerView' ,['manufacturers' => $manufacturers]);
    }
    public function homeopathicManufacturerView(Request $req){
    	if(($req->highserial)-($req->lowserial)>100)
    	{
    		$manufacturers=DB::table('homeopathicmanufacturers')
		    	->whereBetween('id',array(($req->highserial)-100 , $req->highserial))
		    	->get();
    	}
    	else
    	{
    		$manufacturers=DB::table('homeopathicmanufacturers')
		    	->whereBetween('id',array(($req->lowserial) , $req->highserial))
		    	->get();

    	}

    	
    	// return $manufacturers;
    	return view('dgda.manufacturers.homeopathicManufacturerView' ,['manufacturers' => $manufacturers]);
    }



    ////////////////////////////////////////////////////////////Manufacture Profile////////////////////////////////////////////




    public function allopathicManufacturerProfile(Request $req){

    	if(count((array)DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $manufacturer= DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
            // return $manufacturer;
            return view('dgda.manufacturers.allopathicManufacturerProfile' ,['manufacturer' => $manufacturer]);
        }
        else
            return "False License No ";
    }
    public function ayurvedicManufacturerProfile(Request $req){

        if(count((array)DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $manufacturer= DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
            // return $manufacturer;
            return view('dgda.manufacturers.ayurvedicManufacturerProfile' ,['manufacturer' => $manufacturer]);
        }
        else
            return "False License No ";
    }
    public function unaniManufacturerProfile(Request $req){

        if(count((array)DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $manufacturer= DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->first();
            // return $manufacturer;
            return view('dgda.manufacturers.unaniManufacturerProfile' ,['manufacturer' => $manufacturer]);
        }
        else
            return "False License No ";
    }
    public function herbalManufacturerProfile(Request $req){

        if(count((array)DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $manufacturer= DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->first();
            // return $manufacturer;
            return view('dgda.manufacturers.herbalManufacturerProfile' ,['manufacturer' => $manufacturer]);
        }
        else
            return "False License No ";
    }
    public function homeopathicManufacturerProfile(Request $req){

        if(count((array)DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $manufacturer= DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
            // return $manufacturer;
            return view('dgda.manufacturers.homeopathicManufacturerProfile' ,['manufacturer' => $manufacturer]);
        }
        else
            return "False License No ";
    }


    ///////////////////////////////////////////////Action///////////////////////////////////////

    public function allopathicManufacturerProfileAction(Request $req){

        if(count((array)DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Suspend";
            $manufacturer= DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
            if($manufacturer->status==1)
            {
                $buttonText="Activate";
            }
            else
            {

            }
            // return $manufacturer;
            return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }

    public function ayurvedicManufacturerProfileAction(Request $req){

        if(count((array)DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Suspend";
            $manufacturer= DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
            if($manufacturer->status==1)
            {
                $buttonText="Activate";
            }
            else
            {

            }
            // return $manufacturer;
            return view('dgda.manufacturers.ayurvedicManufacturerProfileAction' ,['manufacturer' => $manufacturer],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }

    public function unaniManufacturerProfileAction(Request $req){

        if(count((array)DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Suspend";
            $manufacturer= DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->first();
            if($manufacturer->status==1)
            {
                $buttonText="Activate";
            }
            else
            {

            }
            // return $manufacturer;
            return view('dgda.manufacturers.unaniManufacturerProfileAction' ,['manufacturer' => $manufacturer],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }

    public function herbalManufacturerProfileAction(Request $req){

        if(count((array)DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Suspend";
            $manufacturer= DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->first();
            if($manufacturer->status==1)
            {
                $buttonText="Activate";
            }
            else
            {

            }
            // return $manufacturer;
            return view('dgda.manufacturers.herbalManufacturerProfileAction' ,['manufacturer' => $manufacturer],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }

    public function homeopathicManufacturerProfileAction(Request $req){

        if(count((array)DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
        {
            $buttonText="Suspend";
            $manufacturer= DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
            if($manufacturer->status==1)
            {
                $buttonText="Activate";
            }
            else
            {

            }
            // return $manufacturer;
            return view('dgda.manufacturers.homeopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer],['buttonText'=>$buttonText]);
        }
        else
            return "False License No ";
    }


    ///////////////////////////////////////////////Info Update ////////////////////////////////////////////////////


     public function allopathicManufacturerProfileActionUpdate(Request $req){
        if(count((array)DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                DB::table('allopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['manufacturername' => $req->manufacturername]);
                DB::table('allopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['districtname' => $req->districtname]);
                DB::table('allopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['addresslocation' => $req->addresslocation]);


                return redirect('/dgda/manufacturers/allopathicManufacturerProfile/'.$req->licenseNo);                    
                // return $manufacturer;
                // return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";   
    }

    public function ayurvedicManufacturerProfileActionUpdate(Request $req){
        if(count((array)DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                DB::table('ayurvedicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['manufacturername' => $req->manufacturername]);
                DB::table('ayurvedicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['districtname' => $req->districtname]);
                DB::table('ayurvedicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['addresslocation' => $req->addresslocation]);

                return redirect('/dgda/manufacturers/ayurvedicManufacturerProfile/'.$req->licenseNo);                    
                // return $manufacturer;
                // return view('dgda.manufacturers.ayurvedicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";   
    }

    public function unaniManufacturerProfileActionUpdate(Request $req){
        if(count((array)DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                DB::table('unanimanufacturers')->where('licenseNo', $req->licenseNo)->update(['manufacturername' => $req->manufacturername]);
                DB::table('unanimanufacturers')->where('licenseNo', $req->licenseNo)->update(['districtname' => $req->districtname]);
                DB::table('unanimanufacturers')->where('licenseNo', $req->licenseNo)->update(['addresslocation' => $req->addresslocation]);

                return redirect('/dgda/manufacturers/unaniManufacturerProfile/'.$req->licenseNo);                       
                // return $manufacturer;
                // return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";   
    }

    public function herbalManufacturerProfileActionUpdate(Request $req){
        if(count((array)DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                DB::table('herbalmanufacturers')->where('licenseNo', $req->licenseNo)->update(['manufacturername' => $req->manufacturername]);
                DB::table('herbalmanufacturers')->where('licenseNo', $req->licenseNo)->update(['districtname' => $req->districtname]);
                DB::table('herbalmanufacturers')->where('licenseNo', $req->licenseNo)->update(['addresslocation' => $req->addresslocation]);

                return redirect('/dgda/manufacturers/herbalManufacturerProfile/'.$req->licenseNo);                
                // return $manufacturer;
                // return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";   
    }

    public function homeopathicManufacturerProfileActionUpdate(Request $req){
        if(count((array)DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                DB::table('homeopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['manufacturername' => $req->manufacturername]);
                DB::table('homeopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['districtname' => $req->districtname]);
                DB::table('homeopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['addresslocation' => $req->addresslocation]);

                return redirect('/dgda/manufacturers/homeopathicManufacturerProfile/'.$req->licenseNo);                    
                // return $manufacturer;
                // return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";   
    }


    ////////////////////////////////////////////Search//////////////////////////


    public function Searchmanufacturers(Request $req)
    {
        if(count((array)DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {
            $manufacturer=count((array)DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->get());
            return redirect('/dgda/manufacturers/allopathicManufacturerProfile/'.$req->licenseNo);
            //return $manufacturer;
        }
        else if(count((array)DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {

            return redirect('/dgda/manufacturers/ayurvedicManufacturerProfile/'.$req->licenseNo);
        }
        else if(count((array)DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {

            return redirect('/dgda/manufacturers/unaniManufacturerProfile/'.$req->licenseNo);
        }
        else if(count((array)DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {

            return redirect('/dgda/manufacturers/herbalManufacturerProfile/'.$req->licenseNo);
        }
        else if(count((array)DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
        {

            return redirect('/dgda/manufacturers/homeopathicManufacturerProfile/'.$req->licenseNo);
        }
        else{
            $message="Invalid License No";
             return view('dgda.manufacturers.notFound',['message',$message]);
        } 
           
    }

    //////////////////////////////////////Suspend//////////////////////////////



    public function allopathicManufacturerSuspend(Request $req){

            if(count((array)DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $manufacturer= DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('allopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 1]);
                $affected = DB::table('allopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Suspended"]);
                return redirect('/dgda/manufacturers/allopathicManufacturerProfile/'.$manufacturer->licenseNo);                    
                // return $manufacturer;
                // return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";
    }

    public function ayurvedicManufacturerSuspend(Request $req){

            if(count((array)DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $manufacturer= DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('ayurvedicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 1]);
                $affected = DB::table('ayurvedicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Suspended"]);
                return redirect('/dgda/manufacturers/ayurvedicManufacturerProfile/'.$manufacturer->licenseNo);                    
                // return $manufacturer;
                // return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";
    }

    public function unaniManufacturerSuspend(Request $req){

            if(count((array)DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $manufacturer= DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('unanimanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 1]);
                $affected = DB::table('unanimanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Suspended"]);
                return redirect('/dgda/manufacturers/unaniManufacturerProfile/'.$manufacturer->licenseNo);                    
                // return $manufacturer;
                // return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";
    }

    public function herbalManufacturerSuspend(Request $req){

            if(count((array)DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $manufacturer= DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->first();
                $affected = DB::table('herbalmanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 1]);
                $affected = DB::table('herbalmanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Suspended"]);
                return redirect('/dgda/manufacturers/herbalManufacturerProfile/'.$manufacturer->licenseNo);                    
                // return $manufacturer;
                // return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";
    }

    public function homeopathicManufacturerSuspend(Request $req){

            if(count((array)DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $manufacturer= DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
                 $affected = DB::table('homeopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 1]);
                $affected = DB::table('homeopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Suspended"]);
                return redirect('/dgda/manufacturers/homeopathicManufacturerProfile/'.$manufacturer->licenseNo);                    
                // return $manufacturer;
                // return view('dgda.manufacturers.allopathicManufacturerProfileAction' ,['manufacturer' => $manufacturer]);
            }
            else
                return "False License No ";
    }



        //////////////////////////////////////////////////un Ban//////////////////////////////////


    public function allopathicManufacturerActivate(Request $req){

                if(count((array)DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $manufacturer= DB::table('allopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('allopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 0]);
                    $affected = DB::table('allopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Functional"]);
                    return redirect('/dgda/manufacturers/allopathicManufacturerProfile/'.$manufacturer->licenseNo);     
                // return $manufacturer;
                    // return view('dgda.manufacturers.allopathicRetailmanufacturerProfileAction' ,['manufacturer' => $manufacturer]);
                }
                else
                    return "False License No ";
            }
    public function ayurvedicManufacturerActivate(Request $req){

                if(count((array)DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $manufacturer= DB::table('ayurvedicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('ayurvedicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 0]);
                    $affected = DB::table('ayurvedicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Functional"]);
                    return redirect('/dgda/manufacturers/ayurvedicManufacturerProfile/'.$manufacturer->licenseNo);  
                }
                else
                    return "False License No ";
            }
    public function unaniManufacturerActivate(Request $req){

                if(count((array)DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $manufacturer= DB::table('unanimanufacturers')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('unanimanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 0]);
                    $affected = DB::table('unanimanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Functional"]);
                    return redirect('/dgda/manufacturers/unaniManufacturerProfile/'.$manufacturer->licenseNo);                  
                    // return $manufacturer;
                    // return view('dgda.manufacturers.allopathicRetailmanufacturerProfileAction' ,['manufacturer' => $manufacturer]);
                }
                else
                    return "False License No ";
            }
    public function herbalManufacturerActivate(Request $req){

                if(count((array)DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $manufacturer= DB::table('herbalmanufacturers')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('herbalmanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 0]);
                    $affected = DB::table('herbalmanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Functional"]);
                    return redirect('/dgda/manufacturers/herbalManufacturerProfile/'.$manufacturer->licenseNo);                  
                    // return $manufacturer;
                    // return view('dgda.manufacturers.allopathicRetailmanufacturerProfileAction' ,['manufacturer' => $manufacturer]);
                }
                else
                    return "False License No ";
            }
    public function homeopathicManufacturerActivate(Request $req){

                if(count((array)DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $manufacturer= DB::table('homeopathicmanufacturers')->where('licenseNo',$req->licenseNo)->first();
                    $affected = DB::table('homeopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['status' => 0]);
                    $affected = DB::table('homeopathicmanufacturers')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => "Functional"]);
                    return redirect('/dgda/manufacturers/homeopathicManufacturerProfile/'.$manufacturer->licenseNo);                  
                    // return $manufacturer;
                    // return view('dgda.manufacturers.allopathicRetailmanufacturerProfileAction' ,['manufacturer' => $manufacturer]);
                }
                else
                    return "False License No ";
            }



    public function newManufacturerReq(){

        $manufacturers=DB::table('newmanufacturerrequests')->get();
        return view('dgda.manufacturers.newRequests',['manufacturers'=>$manufacturers]);

    }
    public function viewManufacturerReq(Request $req){

                if(count((array)DB::table('newmanufacturerrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    $manufacturer= DB::table('newmanufacturerrequests')->where('licenseNo',$req->licenseNo)->first();

                    return view('dgda.manufacturers.newRequestsProfile',['manufacturer'=>$manufacturer]);   
                    // return $manufacturer;
                    // return view('dgda.manufacturers.allopathicRetailmanufacturerProfileAction' ,['manufacturer' => $manufacturer]);
                }
                else
                    return "False License No ";

    }

    public function forwardToNBR(Request $req){

                if(count((array)DB::table('newmanufacturerrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    DB::table('newmanufacturerrequests')->where('licenseNo', $req->licenseNo)->update(['status' => 2]);
                    DB::table('newmanufacturerrequests')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => 'Waiting For NBR Confirm']);
                    return redirect('/dgda/manufacturers/requests/'.$req->licenseNo);                   
                    // return $manufacturer;
                    // return view('dgda.manufacturers.allopathicRetailmanufacturerProfileAction' ,['manufacturer' => $manufacturer]);
                }
                else
                    return "False License No ";
    }
    public function confirmManufacturerReq(Request $req){

                if(count((array)DB::table('newmanufacturerrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    DB::table('newmanufacturerrequests')->where('licenseNo', $req->licenseNo)->update(['status' => 4]);
                    DB::table('newmanufacturerrequests')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => 'Confirmed Verification']);
                    return redirect('/dgda/manufacturers/requests/'.$req->licenseNo);                   
                    // return $manufacturer;
                    // return view('dgda.manufacturers.allopathicRetailmanufacturerProfileAction' ,['manufacturer' => $manufacturer]);
                }
                else
                    return "False License No ";
    }
    public function cancelManufacturerReq(Request $req){

                if(count((array)DB::table('newmanufacturerrequests')->where('licenseNo',$req->licenseNo)->first())>0)
                {
                    DB::table('newmanufacturerrequests')->where('licenseNo', $req->licenseNo)->update(['status' => 1]);
                    DB::table('newmanufacturerrequests')->where('licenseNo', $req->licenseNo)->update(['presentstatus' => 'Cancelled Verification']);
                    return redirect('/dgda/manufacturers/requests/'.$req->licenseNo);                   
                    // return $manufacturer;
                    // return view('dgda.manufacturers.allopathicRetailmanufacturerProfileAction' ,['manufacturer' => $manufacturer]);
                }
                else
                    return "False License No ";
    }
}
