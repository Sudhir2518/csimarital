<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Matche;
use Illuminate\Support\Facades\Auth;

class ViewAdminMatch extends Component
{
    public $matches;


    public function mount($id)
    {
         $adminmatch =  Matche::find($id);
         $this->matches = $adminmatch;
    }

    public function render()
    {

        if(Auth::user()->isAdmin){

        return view('livewire.view-admin-match',[
            'matche' => $this->matches,
        ]);
        }else{
            dd("You are not authorized to view this page");
        }


    }


}
