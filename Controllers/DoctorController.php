<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //
    public function index (){
    	return view('doctor.index');
    	
    }
    public function serachmedicine(Request $request){
    	$term=$request->term;
        $data =DB::table('allopathicdrugs')
            ->where('brand_name','like', '' . $term . '%')
            ->orderBy('brand_name')
            ->take(10)
            ->get();
        $results=array();
        foreach($data as $key => $v)
        {
            $results[]=['brand_name'=>$v->brand_name];
        }
        return response()->json($results);
    }

    public function prescribe(Request $req){
        DB::table('prescriptions')->insert([
                            'doctorid'=> $req->session()->get('id'),
                            'patientname' => $req->patientname,
                            'patientcontactno' => $req->patientcontactno,
                            'patientage' => $req->patientage,
                            'patientgender' => $req->patientgender,
                            'problemDesc' => $req->problemDesc,
                            'date' => date("Y-m-d")
                        ]); 
        DB::table('prescriptionitems')->insert([
                            'prescriptionid'=> DB::table('prescriptions')->max('id'),
                            'medicinename' => $req->medicine[1],
                            'morning' => $req->morning[1],
                            'afternoon' => $req->afternoon[1],
                            'evening' => $req->evening[1],
                            'meal' => $req->meal[1],
                            'days'=>$req->days[1]
                        ]); 

        return redirect('/doctor');
    }
}
