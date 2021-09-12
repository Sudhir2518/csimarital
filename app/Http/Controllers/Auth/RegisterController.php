<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Verification;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\VerifyUser;
use App\Models\Vuser;
use App\Rules\AgreeTerms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Str;
use Carbon\Carbon;



class RegisterController extends Controller
{

    public function __invoke()
    {

    }

    public function showRegistrationForm()
    {
        if(!Auth::check()){
            return view('auth.register');
        }else{
            return redirect()->back();
        }

    }

    public function register(Request $request)
    {


            $this->token = md5(microtime());

            $this->validate($request, [
                'profile_photo' => 'sometimes|mimes:png,jpg|max:2064',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'surname' => 'required|max:255',
                'church' => 'required|max:255',
                'mobile' => 'required|numeric|digits:10',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|confirmed',
                'agree_to_terms_and_conditions' => 'required',
                'password' => Password::min(8)
                                ->letters()
                                ->mixedCase()
                                ->numbers()
                                ->symbols()
                                ->uncompromised(),
            ]);


            if(!empty($request->profile_photo)){

                $image1 = $request->profile_photo;
                $imageName1 = $image1->getClientOriginalName();
                $imageNewName1 = explode('.', $imageName1)[0];
                $fileExtention1  = time() . '.' . $imageNewName1 . '.' . $image1->getClientOriginalExtension();
                $location       = storage_path('app/public/profile_photo/');
               
                $image1->move($location, $fileExtention1);


            }

                if(!empty($request->profile_photo)){
                    $photo = $fileExtention1;
                }else{
                    $photo = '';
                }

            $user= User::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'surname'    => $request->surname,
                'church'     => $request->church,
                'mobile'    => $request->mobile,
                'profile_photo' => $photo,
                'email'      => $request->email,
                'forgot_token' => '',
                'isAdmin'         => 0,
                'agree'       => $request->agree_to_terms_and_conditions,
                'password'   => Hash::make($request->password),
              ]);






              Vuser::create([

                  'token'  => Str::random(60),
                  'user_id' => $user->id,

              ]);

              Mail::to($user->email)->send(new VerifyEmail($user));

              return redirect()->route('login')->with("success","You have been successfully registered , please verify you email");




    }

       public function verifyEmail($token)
       {
            $verifiedUser = Vuser::where('token',$token)->first();

             if($verifiedUser){

                $user = $verifiedUser->user;
              if(!$user->email_verified_at){
                $user->email_verified_at = Carbon::now();

                $user->save();

                return redirect()->route('login')->with("success","your email has been verified successfully, kindly login");
             }else{
                 return redirect()->route('login')->with("error","your email has already been verified");
             }
            }else{
                return redirect()->route('login')->with("error", "Something went wrong");
            }
       }


       public function profile()
       {
           return view('auth.profile-change',[
               'user' => User::find(Auth::user()->id),
           ]);
       }

       public function profiles(Request $request){



        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'profile_photo' => 'mimes:png,jpg|max:2064',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'surname' => 'required|max:255',
            'church' => 'required|max:255',
            'mobile' => 'required|numeric|digits:10',
            'email' => 'required|email|max:255',


        ]);




        if(!empty($request->profile_photo)){

            $image1 = $request->profile_photo;
            $imageName1 = $image1->getClientOriginalName();
            $imageNewName1 = explode('.', $imageName1)[0];
            $fileExtention1  = time() . '.' . $imageNewName1 . '.' . $image1->getClientOriginalExtension();
            $location       = storage_path('app/public/profile_photo/');
          
            $image1->move($location, $fileExtention1); 
            File::delete(storage_path('app/public/profile_photo/' . $user->profile_photo));

        }else{
            $fileExtention1 = $user->profile_photo;
        }


        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'surname'    => $request->surname,
            'church'     => $request->church,
            'mobile'     => $request->mobile,
            'profile_photo' => $fileExtention1,
            'email'      => $request->email,
        ]);




        return redirect()->back()->with("success","You have been successfully changed your profile information");

    }

      public function pwchange(Request $request)
      {

        $this->validate($request, [

            'password' => 'required|confirmed',
            'password' => Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()
                            ->uncompromised(),
        ]);




          $user = User::find(Auth::user()->id);

          $user->password = Hash::make($request->password);

          $user->save();

          return redirect()->back()->with("success","Your password is successfully updated");
      }


      public function deleteuser($id)
      {
            dd($id);
      }



}

