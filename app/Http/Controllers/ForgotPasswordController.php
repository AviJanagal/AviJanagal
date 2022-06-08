<?php

namespace App\Http\Controllers;
use Validator;
use Mail;
use Carbon\Carbon;
use App\Mail\MyMail;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forgot_password.forgot_password');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function password_email(Request $request){
        $validator = Validator::make($request->all(), ['email'=>'required|email']);
        $user = \App\User::whereEmail($request->email)->first();
        if(!is_null($user)):
            $otp = \App\Otp::whereUserId($user->id)->first();
        if(!is_null($otp)):
            $otp->expire_at = Carbon::now()->addMinutes(2);
            $otp->code = mt_rand(100000,999999);
            if($otp->save()):
                Mail::to($request->email)->send(new MyMail($otp));
                 session()->put( 'user_id', $user->id);
                 $request->session()->flash('message', 'Otp sent to Your Email');
                return view('forgot_password.forgot_password_otp')->with(['alert'=>'success','message'=>'OTP sent to your email!.']);
            else:
                return view('forgot_password.forgot_password')->with(['alert'=>'danger','message'=>'Something wents wrong!.']);
            endif;
        else:
            $otp = new \App\Otp;
            $otp->user_id = $user->id;
            $id = $user->id;
            $otp->expire_at = Carbon::now()->addMinutes(2);
            $otp->code = mt_rand(100000,999999);
            if($otp->save()):
                Mail::to($request->email)->send(new MyMail($otp));
                session()->put( 'user_id', $user->id);
                return view('forgot_password.forgot_password_otp')->with(['alert'=>'success','message'=>'OTP sent to your email!.']);
            else:
                return view('forgot_password.forgot_password')->with(['alert'=>'danger','message'=>'Something wents wrong!.']);
            endif;
        endif;
        else:
                return view('forgot_password.forgot_password')->with(['alert'=>'danger','message'=>'User not found!.']);
        endif;
    }

    public function forgot_password_otp(){
        return view('forgot_password.forgot_password_otp');
    }
    
    public function match_otp(Request $request){
        // return $request;
        $validator = Validator::make($request->all(), ['otp'=>'required|integer','user_id'=>'required|integer']);
        $user = \App\User::find($request->user_id);
        if(!is_null($user)):
            $otp = \App\Otp::whereCode($request->otp)->whereUserId($user->id)->first();
            if(!is_null($otp)):
                if(Carbon::now() > $otp->expire_at):
                    return view('forgot_password.forgot_password_otp')->with(['alert'=>'success','message'=>'OTP sent to your email!.']);
                else:
                    return view('forgot_password.reset_password')->with(['alert'=>'success','message'=>'OTP sent to your email!.']);
            endif;
        else:
           return view('forgot_password.forgot_password_otp')->with(['alert'=>'success','message'=>'OTP not matched']);
        endif;
        else:
           return view('forgot_password.forgot_password_otp')->with(['alert'=>'success','message'=>'OTP not matched']);
        endif;
    }

    public function change_password(Request $request){
        // return $request;
      $validator = Validator::make($request->all(), ['user_id'=>'required|integer',
                                                    'password' => 'required|confirmed|min:8',
                                                    'password_confirmation' => 'required|same:password|min:8',]);
      $user = \App\User::find($request->user_id);
      if(!is_null($user)):
          $password = \Hash::make($request->password);
          $user->password = $password;
          if($user->save()):
            return redirect()->route('login');
          else:
           return redirect()->route('login');
          endif;
      else:
        return view('forgot_password.reset_password')->with(['alert'=>'success','message'=>'User not found']);
      endif;
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
