<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Country;
use App\Models\Designation;
use App\Models\Edufield;
use App\Models\Eduqual;
use App\Models\Matche;
use App\Models\Occupation;
use App\Models\Organization;

class ViewAllMatch extends Component
{

    public $matche;
    public $age;

    public function render()
    {
        if($this->hasMatches()){
            return view('livewire.view-all-match',[
                'matches' => Matche::where('user_id' ,'!=', Auth::user()->id)
                                     ->where('isApproved','=',1)->paginate(10),

            ]);
        }else{
            return view('livewire.matches',[

                'alert'    => "You must have atleast one approved match under your account in order to browse matches",
                'unapproved' => $this->unapproved(),
            ]);

        }

    }


    public function matchage()
    {
        $this->age = Carbon::parse($this->matche['date_of_birth'])->age;
    }

    public function hasMatches()
    {
        $matchCount = Matche::all()->where('user_id', Auth::user()->id)->where('isApproved','=',1);

        $matchCount1 = $matchCount->count();

        if($matchCount1 > 0 ){
            return true;
        }else{
            return false;
        }
    }

    public function unapproved()
    {
        $unapproved = Matche::where('user_id','=', Auth::user()->id)
                              ->where('isApproved','=',0);

        return $unapproved->count();
    }

   
}
