<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Models\Matche;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApproveMatch extends Modal
{
    public $match;
    public $progress;

    public function mount($id)
    {
        $this->match = Matche::find($id);
    }

    public function render()
    {
        return view('livewire.approve-match',[
            'matche' => $this->match,
        ]);
    }

    public function approveMatch()
    {
        $this->progress = "please wait......";
       $this->match->isApproved = 1;
       $this->match->save();
       $this->progress = '';
       return redirect()->route('adminmatch');

    }
}
