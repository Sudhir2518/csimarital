<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Mail\SendLike;
use App\Models\Like;
use App\Models\Matche;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendRequest extends Modal
{

    public $likedmatch;
    public $likeduser;
    public $sentmsg = '';
    public $yourmatches;
    public $likedbymatches;
    public $umatch;

    protected $liked;





    public function mount($liked,$likedby)
    {

        $matchliked = Matche::find($liked);
        $matchlikedby = User::find($likedby);





        $this->likedmatch = $matchliked;
        $this->likeduser  = $matchlikedby;
        $this->liked = Like::where(['user_id' => $likedby , 'matche_id' => $liked ])->first();
        $this->likedbymatches = Matche::where(['user_id' => $likedby])->get();


    }
    public function render()
    {

        return view('livewire.send-request',[
            'likedmatch' => $this->likedmatch,
            'likeduser' => $this->likeduser,
            'liked' => $this->liked,
            'usermatches' => $this->likedbymatches,
        ]);
    }


    public function saveLike()
    {


        $like = Like::where(['matche_id' => $this->likedmatch, 'user_id' => Auth::user()->id ]);

        if(!$like->count()>0){
            $like = Like::create([
                'user_id' => $this->likeduser->id,
                'matche_id' => $this->likedmatch->id,
                'matche_user_id' => $this->likedmatch->user_id,
                 'liked_user_match' => $this->umatch,
                'token'  => Str::random(60),

           ]);



            Mail::to($this->likedmatch->user->email)->send(new SendLike($this->likeduser, $this->likedmatch, $like->token, $this->liked));

            return redirect()->to('viewonematch/'.$this->likedmatch->id);

        }else{
            dd("You are not authorized to visit the page");
        }





    }
}
