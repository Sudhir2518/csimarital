<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Matche;
use Illuminate\Support\Facades\Auth;

class AdminMatches extends Component
{
    public function render()
    {
        if(Auth::user()->isAdmin){
            $matches = Matche::all();

            return view('livewire.admin-matches',[
                'matches' => $matches,
            ]);
        }else{
            dd("You are not authorized to view this page");
        }

    }


}
