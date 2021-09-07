<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ImageView extends Modal
{

    public $vimage;

    public function mount($image)
    {
        $this->vimage = $image;
    }

    public function render()
    {

        return view('livewire.image-view',[
            'image' => $this->vimage,
        ]);
    }
}
