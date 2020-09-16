<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;


class DownloadController extends Controller
{
    //

    public function allopathicRetailPharmacyTaxListDownload(Request $req){

    	if(count((array)DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('allopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                
                $pdf = PDF::loadView('nbr.pharmacies.allopathicRetailPharmacyTaxViewDownload',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                return $pdf->download('Allopathic_pharmacy_'.$pharmacy->licenseNo.'.pdf');
            }
            else
                return "False License No ";

    }
    public function ayurvedicRetailPharmacyTaxListDownload(Request $req){

        if(count((array)DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first())>0)
            {
                $pharmacy= DB::table('ayurvedicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                
                $pdf = PDF::loadView('nbr.pharmacies.allopathicRetailPharmacyTaxViewDownload',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                return $pdf->download('Ayurvedic_pharmacy_'.$pharmacy->licenseNo.'.pdf');
            }
            else
                return "False License No ";

    }
    public function unaniRetailPharmacyTaxListDownload(Request $req){

        if(count((array)DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('unanipharmacies')->where('licenseNo',$req->licenseNo)->first();
                $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                
                $pdf = PDF::loadView('nbr.pharmacies.allopathicRetailPharmacyTaxViewDownload',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                return $pdf->download('Unani'.$pharmacy->licenseNo.'.pdf');
            }
            else
                return "False License No ";

    }
    public function herbalRetailPharmacyTaxListDownload(Request $req){

        if(count((array)DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('herbalpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                
                $pdf = PDF::loadView('nbr.pharmacies.allopathicRetailPharmacyTaxViewDownload',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                return $pdf->download('Herbal_pharmacy_'.$pharmacy->licenseNo.'.pdf');
            }
            else
                return "False License No ";

    }
    public function homeopathicRetailPharmacyTaxListDownload(Request $req){

        if(count((array)DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->get())>0)
            {
                $pharmacy= DB::table('homeopathicpharmacies')->where('licenseNo',$req->licenseNo)->first();
                $taxes= DB::table('pharmacyTaxTransictions')->where('licenseNo',$req->licenseNo)->get();
                
                $pdf = PDF::loadView('nbr.pharmacies.allopathicRetailPharmacyTaxViewDownload',['taxes'=>$taxes],['pharmacy'=>$pharmacy]);                    
                // return $pharmacy;
                // return view('dgda.pharmacies.allopathicRetailPharmacyProfileAction' ,['pharmacy' => $pharmacy]);
                return $pdf->download('Homeopathic_pharmacy_'.$pharmacy->licenseNo.'.pdf');
            }
            else
                return "False License No ";

    }
    
}
