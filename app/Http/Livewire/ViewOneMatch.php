<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Matche;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Boolean;

class ViewOneMatch extends Component
{

    public $matche;

    public $age;

    public $liked = false ;

    public  $likedmatches;

    public $likedall;

    public $mid;

    public function mount($id)
    {
        $this->matche = Matche::find($id);

        $this->mid = $id;


    }

    public function render(Matche $matche)
    {
        if($this->hasMatches()){
            return view('livewire.view-one-match', compact('matche'),[

                 'isliked' => $this->isLiked(),

            ]);


        }else{
             dd("You are not authorized to view that page");
        }

    }
    public function hasMatches()
    {
        $matchCount = Matche::where('user_id', '=', Auth::user()->id );

        $matchCount1 = $matchCount->count();

        if($matchCount1 > 0 ){
            return true;
        }else{
            return false;
        }
    }

    public function isLiked()
    {
         $likedmatches = Like::where(['user_id' => Auth::user()->id,'matche_id' => $this->mid]);

           return $likedmatches->count();
    }
}
