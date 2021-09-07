<?php

namespace App\Http\Livewire;
use App\Http\Livewire\Modal;

use Livewire\Component;


class UimageView extends Modal
{

    public $uimage;

    public function mount($uimage)
    {
         $this->uimage = $uimage;
    }

    public function render()
    {
        return view('livewire.uimage-view',[
            'uimage' => $this->uimage,
        ]);
    }
}
