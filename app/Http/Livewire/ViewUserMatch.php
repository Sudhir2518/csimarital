<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Matche;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Http\Livewire\SendRequest;

class ViewUserMatch extends Component
{
    public $uid;
    public $um;
    public $mid;
    public $token;

    public function mount($id,$um,$token)
    {
       $this->token = $token;
       $this->uid = $id;
       $this->um = $um;

    }
    public function render()
    {
        if($this->isTokenVerified()){

           $user = User::find($this->uid);
           $matche = Matche::find($this->um);
            return view('livewire.view-user-match',[
                'user' => $user,
                'matche' => $matche,
                'isliked' => $this->isLiked(),
            ]);
        }else{

            dd("you are not authorized to visit this page");
        }

    }

    public function isTokenVerified()
    {
        $likes = Like::where(['matche_user_id' => Auth::user()->id, 'token' => $this->token]);

        if($likes->count()>0){
            return true;
        }else{
            return false;
        }


    }

    public function isLiked()
    {
         $likedmatches = Like::where(['user_id' => Auth::user()->id,'matche_id' => $this->um]);

           return $likedmatches->count();
    }


}
