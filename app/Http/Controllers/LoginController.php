<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Mail\RestPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public $token;
    public $uid;
    public $route;

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function validateLogin(Request $request)
    {



        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            if(Auth::user()->email_verified_at == null){
                Auth::logout();
                return redirect()->route('login')->with("message","Kindly verify your email first before login");
            }

                    return redirect()->route('welcomeuser')->with("success","You are logged in");


        }

        return redirect()->route('login')->with('error', 'Invalid login details');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            if(Auth::user()->email_verified_at == null){
                Auth::logout();

                return redirect(route('login'))->with("error","Kindly verify your email first before login");
            }

            return redirect()->route('login')->with('error', 'Invalid login details');
        }

        return redirect()->route('welcomeuser');
    }

    public function isAdmin($id)
    {
        $user_role = User::find($id);

           if($user_role->id = 5){
               return true;
           }else{
               return false;
           }
    }


    public function forgotpassword()
    {
        if(!Auth::check()){


            return view('auth.forgot_password');
        }
    }


    public function forgotem(Request $request, User $user)
    {
         $this->validate($request,[
             'email' => ['required','email','max:255'],
         ]);
        $this->token = Str::random(60);
        $token = $this->token;


         $sel_user = User::where('email', trim($request->email))->first();



         if($sel_user == null){
             return redirect()->back()->with("error", "the email you entered is not found ");
         }


         $sel_user->forgot_token = $token;

         $sel_user->save();


        Mail::to($request->email)->send(new RestPassword($sel_user,$token));

        return redirect()->back()->with("success","an email with reset link is sent to your email id".$request->email);

    }

    public function resetpw($id,$token)
    {


       $user = User::where('forgot_token',$token)->first();



       if($user->id != $id){
              dd("you are not authorized to perform this action");
       }

       if(!$user == null){
               return view('auth.resetpw',[
                   'user_id' => $id,
               ]);
       }else{
        dd("something went wrong, you might havae already reset your password");
       }

    }

    public function resetpws(Request $request)
    {
         $this->validate($request,[
             'password' => 'required|confirmed',Password::min(8)
             ->letters()
             ->mixedCase()
             ->numbers()
             ->symbols()
             ->uncompromised(),
         ]);



         $sel_user = User::where('id', $request->user_id )->first();

         $sel_user->password = Hash::make($request->password);

         $sel_user->save();

         return redirect()->route('login')->with("success","your password has been successfully set you can login now");


    }
}
