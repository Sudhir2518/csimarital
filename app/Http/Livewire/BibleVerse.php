<?php

namespace App\Http\Livewire;

use App\Models\Biblequote;
use Livewire\Component;

class BibleVerse extends Component
{
    public function render()
    {
        $bbq = Biblequote::where('selected','=',1)->first();

        return view('livewire.bible-verse',[
            'bbq' => $bbq,
        ]);
    }
}
