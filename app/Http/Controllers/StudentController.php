<?php

namespace App\Http\Controllers;
use Hash;
use DB;
use Auth;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('front.student_dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function student_register(){
        $states = DB::table('state')->get();
        $person_type = \App\PersonType::get();
        return view('front.student_register',compact('states','person_type'));
    }


    public function student_registration(Request  $request){
        // return $request;
        $this->validate($request,['email'=>"required|string|email|max:255|unique:users"]);
        $student = new \App\User ;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->apartment = $request->apartment;
        $student->state = $request->state;
        $student->zip_code = $request->zip_code;
        $student->phone_number = $request->phone_number;
        $student->role_name = "user";
        if($student->save()){
           $details = [
                'title' => 'Mail from Bridge App',
                'body' => 'Welcome To Bridge App'
            ];
            Mail::to($request->email)->send(new WelcomeMail($details));
            return redirect()->route('login')->with(['alert'=>'success','message'=> 'You Are successfully Registered! Please Sign in to access Bridge learning contents']);
        } else {
            return redirect()->back()->with(['alert'=>'danger','message'=>'Oops! Something went wrong']);  
        }
        
    }

    public function get_data(Request $request){
        $subject = $request->subject; 
        $module = $request->module;
        $session = $request->session;
        $published_by = $request->published_by;

        if($subject !== "null" && $module !== "null" && $session !== "null" && $published_by !== "null"){
            $data = \App\Session::where('session_subject',$subject)->where('module_id', $module)->where('id',$session)->where('published_by',$published_by)->get();
        }
        elseif ($subject !== "null" && $module !== "null" && $session !== "null" && $published_by == "null") {
            $data = \App\Session::where('session_subject',$subject)->where('module_id', $module)->where('id',$session)->get();
        }
        elseif ($subject !== "null" && $module !== "null" && $session == "null" && $published_by == "null") {
            $data = \App\Session::where('session_subject',$subject)->where('module_id', $module)->get();
        }
        elseif ($subject !== "null" && $module == "null" && $session == "null" && $published_by == "null") {
            $data = \App\Session::where('session_subject',$subject)->get();
        }
        elseif ($subject !== "null" && $module == "null" && $session !== "null" && $published_by == "null") {
            $data = \App\Session::where('session_subject',$subject)->where('id',$session)->get();
        }
        elseif ($subject !== "null" && $module == "null" && $session !== "null" && $published_by !== "null") {
            $data = \App\Session::where('session_subject',$subject)->where('id',$session)->where('published_by',$published_by)->get();
        }
        elseif ($subject !== "null" && $module == "null" && $session == "null" && $published_by !== "null") {
            $data = \App\Session::where('session_subject',$subject)->where('published_by',$published_by)->get();
        }
        elseif ($subject == "null" && $module !== "null" && $session !== "null" && $published_by == "null") {
            $data = \App\Session::where('module_id', $module)->where('id',$session)->get();
        }
        elseif ($subject == "null" && $module !== "null" && $session !== "null" && $published_by !== "null") {
            $data = \App\Session::where('module_id', $module)->where('id',$session)->where('published_by',$published_by)->get();
        }
        elseif ($subject == "null" && $module !== "null" && $session == "null" && $published_by !== "null") {
            $data = \App\Session::where('module_id', $module)->where('published_by',$published_by)->get();
        }
        elseif ($subject == "null" && $module !== "null" && $session == "null" && $published_by == "null") {
            $data = \App\Session::where('module_id', $module)->get();
        }
        elseif ($subject == "null" && $module == "null" && $session !== "null" && $published_by == "null") {
            $data = \App\Session::where('id',$session)->get();
        }
        elseif ($subject == "null" && $module == "null" && $session == "null" && $published_by !== "null") {
            $data = \App\Session::where('published_by',$published_by)->get();
        }
        elseif ($subject == "null" && $module == "null" && $session == "null" && $published_by == "null") {
            $data = \App\Session::get();
        }
        elseif ($subject !== "null" && $module !== "null" && $session == "null" && $published_by !== "null") {
            $data = \App\Session::where('session_subject',$subject)->where('module_id', $module)->where('published_by',$published_by)->get();
        }
        else{
            $data = \App\Session::get();
        }
        return response()->json(['data'=>$data]);
    }

    public function change_password_blade(){
        $user_id = Auth::id();
        return view('change_password',compact('user_id'));
    }


    public function change_student_password(Request $request){
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            return redirect()->back()->with(['alert'=>'error','message'=>'Your current password does not matches with the password you provided. Please try again.']);

        }
        if(strcmp($request->current_password, $request->new_password) == 0){
            return redirect()->back()->with(['alert'=>'error','message'=>'New Password cannot be same as your current password. Please choose a different password.']);
        }
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();
            return redirect()->back()->with(['alert'=>'success','message'=>'Password changed successfully !']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
