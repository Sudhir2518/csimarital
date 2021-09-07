<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;

class FimageView extends Modal
{

    public $vimage;

    public function mount($fimage)
    {
       $this->vimage = $fimage;
    }
    public function render()
    {
        return view('livewire.fimage-view',[
            'fimage' => $this->vimage,
        ]);
    }
}
