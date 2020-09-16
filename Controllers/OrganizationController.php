<?php
namespace App\Http\Controllers;
use App\Organization;
use App\User;
use App\Offer;
use App\University;
use App\Application;
use App\Student;
use App\Approve;
use Illuminate\Http\Request;
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('organization.index');
    }
    public function profile(Request $request)
    {
        $organization=Organization::Where('username',$request->session()->get('username'))
        ->first();
        return view('organization.profile')->with('organization', $organization);
    }
    public function editpersonal(Request $request)
    {
        $org=Organization::select('name','email','contact','username')->where('username', $request->session()->get('username'))->first();
        return view('organization.personal')->with('organization',$org);
    }
    public function editaddress(Request $request)
    {
        $org=Organization::select('addressline','city','country')->where('username', $request->session()->get('username'))->first();
        return view('organization.address')->with('organization',$org);
    }
    public function editattachment(Request $request)
    {
        $org=Organization::select('approval','information','description')->where('username', $request->session()->get('username'))->first();
       
        return view('organization.attachment')->with('organization',$org);
    }
    public function editpassword(Request $request)
    {
        
        return view('organization.password');
    }
    //update personal organization database
    public function updatepersonal(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'contact'=>'required',           
            'username'=>'required',
            
        ]);
       
       
       
        $organization=Organization::where('username', $request->session()->get('username'))->first();
        $user=User::where('username', $request->session()->get('username'))->first();
        //$offer=Offer::where('organizationname', $request->session()->get('organizationname'))->first();
        
        $organization->name =$request->name;
        $organization->email = $request->email;
        $organization->contact = $request->contact;
        $organization->username = $request->username;
        $user->username=$request->username;
        //$offer->organizationname=$request->name;
        
        if($user->save() && $organization->save())
        {
            $request->session()->put('username', $request->input('username'));
            //organization name change
            $organization=Organization::where('username',$request->username)->first();
			$request->session()->put('organizationname', $organization->name);
            return redirect()->route('organization.profile');
        }
        else{
            return redirect()->route('organization.personal');
        }
        
    }
    public function updateaddress(Request $request)
    {
       
        $request->validate([
            'addressline'=>'required',
            'city'=>'required',
            'country'=>'required',           
           
        ]);     
       
        $organization=Organization::where('username', $request->session()->get('username'))->first();
        $organization->addressline =$request->addressline;
        $organization->city = $request->city;
        $organization->country = $request->country;
    
        
        if( $organization->save())
        {           
            return redirect()->route('organization.profile');
        }
        else{
            return redirect()->route('organization.address');
        }
    }
    public function updateattachment(Request $request)
    {
        $request->validate([
            
            'approval'=>'required|mimes:pdf',
            'information'=>'required|mimes:pdf',
        ]);
       $username= $request->session()->get('username');
      
       $approvalfile_name="";
       $informationfile_name="";
       if($request->hasFile('approval') && $request->hasFile('information')){
           $approval = $request->file('approval');
           $information = $request->file('information');
           $approvalfile_name= "approval_".$username."_".time().rand(100,999).".".$approval->getClientOriginalExtension();;
           $informationfile_name = "information_".$username."_".time().rand(100,999).".".$information->getClientOriginalExtension();;
         
           $approval->move('upload_Approval',$approvalfile_name);
           $information->move('upload_Information',$informationfile_name);
       }
       $organization=Organization::where('username', $request->session()->get('username'))->first();
        $organization->approval = $approvalfile_name;
        $organization->information =$informationfile_name;
  
        if( $organization->save())
        {           
            return redirect()->route('organization.profile');
        }
        else{
            return redirect()->route('organization.attachment');
        }
    }
    //password
    public function currentpassword(Request $request)
    {$request->validate([
            
        'currentpassword'=>'required',
       
    ]);
        $user=User::where('username',$request->session()->get('username'))->first();
        if($user->password==$request->currentpassword)
        {
            return redirect()->route('organization.confirm');
        }
        else{
            $request->session()->flash('pass', 'Opps!!Old password does not match.');
            return view('organization.password');
        }
        
        
    }
    public function confirmpassword(Request $request)
   {
       return view('organization.confirmpassword');
        
    }
    //confirm newpassword post
    public function confirmpasswordpost(Request $request)
    {$request->validate([
            
        'newpassword'=>'required|min:4|max:8',
        'repeatnewpassword' => 'same:newpassword',
       
    ]);
        $organization=Organization::where('username',$request->session()->get('username'))->first();
        $user=User::where('username',$request->session()->get('username'))->first();
        $organization->password=$request->repeatnewpassword;
        $user->password=$request->repeatnewpassword;
        if($organization->save()&&$user->save())
        {
            return redirect()->route('organization.massage');
        }
        else{
            return redirect()->route('organization.confirm');
        }
        
        
    }
    //massage
    public function massage(Request $request)
   {
       return view('organization.massage');
        
    }
    public function massagebackprofile(Request $request)
   {
    return redirect()->route('organization.profile');
        
    }
    //offer all university show
    public function offerindex(Request $request)
    {
        $name = University::all();
        return view('offerorganization.index')->with('name',$name);
     
         
     }
     //post offer
     public function offeradded(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'degree'=>'required',           
            'startdate'=>'required|after:today',
            'deadline'=>'required|after:startdate',
            'percentage'=>'required',
            'name'=>'required',
            'totalseat'=>'required',
            
        ]);
        $offer=new offer; 
        $offer->organizationname=$request->session()->get('organizationname');
        $offer->title=$request->title;
        $offer->description=$request->description;
        $offer->degree=$request->degree;
        $offer->startdate=$request->startdate;
        $offer->deadline=$request->deadline;
        $offer->percentage=$request->percentage;
        $offer->universityname=$request->name;
        $offer->totalseat=$request->totalseat;
       if($offer->save())
       {
        return redirect()->route('offer.massage');  
       } 
    else{
        return redirect()->route('offer.index');
    }
    
     
         
     }
//massage offer
public function massagetooffer(Request $request)
{
    return view('offerorganization.massageoffer');
     
 }
 public function massagepostoffer(Request $request)
{
    return redirect()->route('organization.index');
     
 }
 //offer list
 public function offerlist(Request $request)
{
    $offer= Offer::where('organizationname',$request->session()->get('organizationname'))->get();
    
     return view('offerorganization.offerlist')->with('offer',$offer);
     
 }
 //search offer list
 public function offerlistsearch(Request $request)
{
    $id= Offer::where('id',$request->search)
    ->where('organizationname', $request->session()->get('organizationname')) ->get();
    $university= Offer::where('universityname',$request->search)
    ->where('organizationname', $request->session()->get('organizationname')) ->get();
    $degree= Offer::where('degree',$request->search)
    ->where('organizationname', $request->session()->get('organizationname')) ->get();
    $percentage= Offer::where('percentage',$request->search)
    ->where('organizationname', $request->session()->get('organizationname')) ->get();
   
    if(count($id)>0)
    {
        return view('offerorganization.offerlist')->with('offer',$id);
    }
   elseif(count($degree)>0)
   {
    return view('offerorganization.offerlist')->with('offer',$degree);
   }
   elseif(count($university)>0)
   {
    return view('offerorganization.offerlist')->with('offer',$university);
   }
   elseif(count($percentage)>0)
   {
    return view('offerorganization.offerlist')->with('offer',$percentage);
   }
    else{
        return redirect()->route('offer.list'); 
    }
     
 }
   //offerDetails
   public function offerDetails(Request $request,$id)
{
    $offer= Offer::find($id);
    
     return view('offerorganization.offerdetails')->with('offer',$offer);
     
 } 
 //view offer update
 public function viewInfo(Request $request,$id)
 {
 
     $offer= Offer::find($id);
     
      return view('offerorganization.updateInfo')->with('offer',$offer);
      
  } 
  public function viewDate(Request $request,$id)
 {
 
     $offer= Offer::find($id);
     
      return view('offerorganization.updateDate')->with('offer',$offer);
      
  } 
  public function viewSeat(Request $request,$id)
 {
 
     $offer= Offer::find($id);
     
      return view('offerorganization.updateSeat')->with('offer',$offer);
      
  } 
  //update offer
  public function updateInfo(Request $request,$id)
 {
    $request->validate([
        'title'=>'required',
        'description'=>'required',
        'degree'=>'required',   
        'percentage'=>'required',
        
    ]);
    $offer= Offer::find($id);
     
    $offer->title=$request->title;
    $offer->description=$request->description;
    $offer->degree=$request->degree;
    $offer->percentage=$request->percentage;
      if($offer->save())
      {
        return redirect()->route('offer.details',$offer->id); 
      }
      else{
        return redirect()->route('offer.list'); 
      }
      
  } 
  public function updateDate(Request $request,$id)
  {
     $request->validate([
        'startdate'=>'required|after:today',
        'deadline'=>'required|after:startdate',
         
     ]);
     $offer= Offer::find($id);
      
     $offer->startdate=$request->startdate;
     $offer->deadline=$request->deadline;
    
       if($offer->save())
       {
         return redirect()->route('offer.details',$offer->id); 
       }
       else{
         return redirect()->route('offer.list'); 
       }
       
   } 
   public function updateSeat(Request $request,$id)
  {
     $request->validate([
        'seat'=>'required|numeric|int',
         
     ]);
     $offer= Offer::find($id);
      
     $s=$request->seat;
     $p=$offer->totalseat;
     $total=$s+$p;
    $offer->totalseat=$total;
    if($p+$s<0)
    {
        $request->session()->flash('msg', 'Number of seat can not negative number');
        return redirect()->route('offer.updateSeat',$offer->id); 
    }
       if($offer->save())
       {
         return redirect()->route('offer.details',$offer->id); 
       }
       else{
         return redirect()->route('offer.list'); 
       }
       
   } 
   public function offerDelete(Request $request,$id)
   {
       $offer=Offer::find($id);
       
       if($offer->delete())
       {
        return redirect()->route('offer.list'); 
       }
       else{
        return redirect()->route('offer.details',$offer->id);
       }
   }
   //student pending application
   public function pendingApplication(Request $request)
   {
       
      $application=Application::Where('orgname',$request->session()->get('organizationname'))
                             ->Where('status',0)->get();
      return view('organization.studentapplication')->with('application',$application);
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //student profile
    public function studentProfile(Request $request,$id)
    {
       $application=Application::find($id);
       $student=Student::where('username',$application->appliedby)->first();
       //dd($student);
       return view('organization.studentprofile')->with('student',$student);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //approve for student
    public function viewApproveApplication(Request $request,$id)
    {
       $application=Application::find($id);
       $student=Student::where('username',$application->appliedby)->first();
       $application->status=1;
       $approve= new Approve;
       $approve->apId=$application->id;
       $approve->orgName=$request->session()->get('organizationname');
       $approve->title=$application->title; 
       $approve->studentname=$application->studentname; 
       $approve->studentusername=$application->appliedby; 
       $approve->university=$application->university;
       $offer=Offer::where('universityname',$application->university)
                  ->where('organizationname',$request->session()->get('organizationname')) 
                  ->where('degree',$student->applyfor)->first();
                  if($offer==null)
                  {
                    return redirect()->route('no.seat');
                  }
       $offer->totalseat=$offer->totalseat-1;
       if( $offer->totalseat>=0)
       {
        if($approve->save()&& $application->save()&& $offer->save())
        {
          return redirect()->route('available.seat',$offer->id); 
        } 
        else{
          return redirect()->route('orgstudent.application'); 
        }
       }
    else{
        return redirect()->route('no.seat');
       
    }
      
            
    }
    //no seat
    public function  noseat(Request $request)
    {
        return view('organization.noseat');
    }
    public function noseatpost(Request $request)
    {
        return redirect()->route('orgstudent.application');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    //rejected
    public function viewRejectApplication(Request $request,$id)
    {
        $application=Application::find($id);
        $application->status=2;
        if($application->save())
        {
          return redirect()->route('orgstudent.application'); 
        } 
        else{
          return redirect()->route('orgstudent.application'); 
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    //approved list
    public function approveliststudent(Request $request)
    {
         $approve=Approve::where('orgName',$request->session()->get('organizationname'))->get();
         return view('organization.approvestudent')->with('approve',$approve);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function approvedelete(Request $request,$id)
    {
       $approve=Approve::find($id);
       $approve->delete();
       return redirect()->route('approve.list'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    //massage approve total seat
    public function availableseat(Request $request,$id)
    {
        $offer=Offer::find($id);
        return view('organization.approveseatavailable')->with('offer',$offer);
    }
    public function redirectApprovelist(Request $request,$id)
    {
        
        return redirect()->route('approve.list'); 
    }
}