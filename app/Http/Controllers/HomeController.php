<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_users = \App\User::where('role_name','user')->count();
        $total_sessions = \App\Session::count();
        $total_modules = \App\Module::count();
        return view('home',compact('total_users','total_sessions','total_modules'));
    }

    public function all_students(){
        $users = \App\User::where('role_name','user')->get();
        return view('all_students',compact('users'));
    }

    public function view_student_detail($id){
        $students = \App\User::where('id',$id)->first();
        return view('view_student_detail',compact('students'));
    }
}
