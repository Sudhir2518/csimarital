<?php

namespace App\Http\Livewire;

use Livewire\Component;
use  App\Http\Livewire\Modal;

class MembershipView extends Modal
{

    public $mcert;

    public function mount($mcert)
    {
        $this->mcert = $mcert;
    }

    public function render()
    {
        return view('livewire.membership-view',[
            'mcert' => $this->mcert,
        ]);
    }
}
