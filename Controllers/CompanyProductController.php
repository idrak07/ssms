<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\CompanyProductRequest;
use Illuminate\Support\Facades\DB;

class CompanyProductController extends Controller
{
	public function index(){
    	$productlist = DB::table('medicines')
    				->join('generics', 'generics.id', '=', 'medicines.genericid')
				    ->join('types', 'types.id', '=', 'medicines.typeid')
    	            ->where('medicines.cid',session("Companyid"))
    	            ->orderBy('medicines.name')
    	            ->select('medicines.*', 'generics.name as gname','types.name as tname')
       			    ->get();
    	return view('companyhome.productlist',['productlist'=>$productlist]);
    }

    public function productdetails($prodid){
    	$productinfo = DB::table('medicines')
    				  ->join('generics', 'generics.id', '=', 'medicines.genericid')
				      ->join('types', 'types.id', '=', 'medicines.typeid')
				      ->where('medicines.id',$prodid)
                      ->where('medicines.cid',session("Companyid"))
				      ->select('medicines.*', 'generics.name as gname','types.name as tname')
       			      ->first();
       	return view('companyhome.productdetails',['productinfo'=>$productinfo]);
    }

    public function hide($prodid){
    	DB::table('medicines')
            ->where('Id', $prodid)
            ->update(['status' => "Hidden"]);
        return redirect()->back();
    }

    public function unhide($prodid){
    	DB::table('medicines')
            ->where('Id', $prodid)
            ->update(['status' => "Listed"]);
        return redirect()->back();
    }

    public function productreleaserequest(){
    	$typelist = DB::table('types')
    				->get();
    	return view('companyhome.productrelease',['typelist'=>$typelist]);
    }

    public function genericsearch(Request $request)
    {
        $term=$request->term;
        $data = DB::table('generics')
            ->where('name','like', '' . $term . '%')
            ->orderBy('name')
            ->take(5)
            ->get();
        $results=array();
        foreach($data as $key => $v)
        {
            $results[]=['id'=>$v->id, 'value'=>$v->name];
        }
        return response()->json($results);
    }

    public function productreleaserequestsubmit(CompanyProductRequest $req){
    	DB::table('medicines')->insertGetId(
            ['name' => $req->name, 'details' => $req->details, 'price' => $req->price, 'cid' => session("Companyid"), 
            'genericid' => $req->genericid, 'typeid' => $req->typeid, 'mg' => $req->mg, 'mrp' => $req->mrp,
            'unitperbox' => $req->unitperbox, 'status' => "Pending",]
        );
        return view('companyhome.requestsubmitted');
    }


    public function productsearch(Request $req){
        $data = DB::table('medicines')
        ->join('generics', 'generics.id', '=', 'medicines.genericid')
		->join('types', 'types.id', '=', 'medicines.typeid')
		->where('medicines.cid',session("Companyid"))
		->where('medicines.name','like',''.$req->search . '%')
		->orderBy('medicines.name')
        ->select('medicines.*', 'generics.name as gname', 'types.name as tname')
        ->get();
                
        if($data){
            foreach($data as $value => $search){
                echo '<tr> <td>' . $search->name . '</td>
                           <td>' . $search->gname . '</td>
                           <td>' . $search->tname . '</td>
                           <td>' . $search->mg . '</td>
                           <td>' . $search->price . '</td>
                           <td>' . $search->mrp . '</td>
                           <td>' . $search->status . '</td>
                           <td>
                                <a id="details" href="/companyproduct/details/' . $search->id . '">Details</a> ';
                                if($search->status == "Listed")
                                	echo ' <a id="trash" onclick="" href="/companyproduct/hide/' . $search->id . '">Hide</a>';
                                if($search->status == "Hidden")
                                	echo ' <a id="details" onclick="" href="/companyproduct/unhide/' . $search->id . '">Unhide</a>';
                           echo'</td>
                       <tr>';
            }
        }
    }
}
