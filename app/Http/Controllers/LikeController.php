<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Matche;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index($uid,$mid,$token)
    {
         $check = Like::where(['user_id' => $uid , 'matche_id' => $mid ,'token' => $token]);

         if($check->count()>0){

            return view('likedby',[
                'match' => Matche::all()->where('id',$mid)->first(),
                'user'  => User::all()->where('id',$uid)->first(),
                'usermatch' => Matche::all()->where('user_id',$uid),
            ]);

         }else{

            dd("something is wrong with this url");
         }
    }
}
