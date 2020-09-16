<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Offer;
use App\Application;
class StudentController extends Controller
{
    function index(){
        $offers=Offer::all();
        //echo $offers[0]->title;
        return view('student.index')->with('offers',$offers);
    }
    function profile(){
        $student=Student::where('username',session('username'))->first();
        return view('student.profile')->with('student',$student);
    }
    function editProfile(){
        $student=Student::where('username',session('username'))->first();
        return view('student.editprofile')->with('student',$student);
    }
    function updateProfile(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'dob'=>'required',
            'username'=>'required'
        ]);
        $student=Student::where('username',session('username'))
          ->update(['name' => $req->name,
                    'email'=>$req->email,
                    'contact'=>$req->contact,
                    'applyfor'=>$req->applyfor,
                    'eq1'=>$req->eq1,
                    'r2'=>$req->r1,
                    'eq2'=>$req->eq2,
                    'r2'=>$req->r2,
                    'eq3'=>$req->eq3,
                    'r3'=>$req->r3,
                    'eq4'=>$req->r4,
                    'username'=>$req->username
          ]);
          if($student!=null){
            $req->session()->put('name', $req->name);
            $user=User::where('username',session('username'))
                        ->update(['username' => $req->username]);
            $req->session()->put('username',$req->username);
            if($user!=null){
                    return redirect()->route('student.profile');
            }
            else
                return redirect()->route('student.editprofile');
          }   
    }
    function editPassword(){
        return view('student.updatepassword');
    }
    function updatePassword(Request $req){
        $req->validate([
            'password'=>'required|min:4|max:15',
            'confirmpassword'=>'same:password'
        ]);
        $user = User::where('username', session('username'))
					->where('password', $req->currentpassword)
                    ->first();
        if($user!=null){
            $user=User::where('username',session('username'))
                        ->update(['password' => $req->password]);
            return redirect()->route('student.profile');
        }
        else{
            $req->session()->flash('msg', 'Invalid Current Password');
			return redirect()->route('student.updatepassword');
        }
        return view('student.updatepassword');
    }
    function editCV(){
        return view('student.updatecv');
    }
    function updateCV(Request $req){
        $req->validate(['cv'=>'mimes:pdf,doc,docx']);
        if($req->hasFile('cv')){
            $cv = $req->file('cv');
            $cvfile_name= "cv_".session('username')."_".time().rand(100,999).".".$cv->getClientOriginalExtension();
            $cv->move('upload_cv',$cvfile_name);
            $student=Student::where('username',session('username'))
                            ->update(['cv' => $cvfile_name]);
            if($student!=null)
                return redirect()->route('student.profile');
            else
                return redirect()->route('student.updatecv');
        }
        else{
            $req->session()->flash('msg', 'Select CV from your local directory');
			return redirect()->route('student.updatecv');
        }
    }
    function editPicture(){
        return view('student.updatepicture');
    }
    
    function updatePicture(Request $req){
        $req->validate(['image'=>'mimes:jpg,jpeg']);
        if($req->hasFile('image')){
            $image = $req->file('image');
            $imagefile_name= "image_".session('username')."_".time().rand(100,999).".".$image->getClientOriginalExtension();
            $image->move('upload_image',$imagefile_name);
            $student=Student::where('username',session('username'))
                            ->update(['image' => $imagefile_name]);
            if($student!=null)
                return redirect()->route('student.profile');
            else
                return redirect()->route('student.updateimage');
        }
        else{
            $req->session()->flash('msg', 'Select Picture from your local directory');
			return redirect()->route('student.updatepicture');
        }
    }
    function apply($id){
        return view('student.apply');
    }
    function confirmApply(Request $req,$id){
        $req->validate([
            'intro' => 'required',
            'purpose' => 'required'
        ]);
        $purpose=$req->purpose;
        $intro=$req->intro;
        $offer=Offer::where('id',$id)->first();
        $offererusername=$offer->offererusername;
        $title=$offer->title;
        $application=new Application();
        $application->title=$title;
        $application->appliedby=session('username');
        $application->offerid=$id;
        $application->intro=$intro;
        $application->purpose=$purpose;
        $application->appliedto=$offererusername;
        if($application->save())
            return redirect()->route('student.index');
        else
            return redirect()->route('student.apply',$id);
    }
    function applications(){
        $applications=Application::where('appliedby',session('username'))->get();
        return view('student.applications')->with('applications',$applications);
    }
}