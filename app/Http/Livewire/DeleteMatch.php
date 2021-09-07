<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Models\Matche;


class DeleteMatch extends Modal
{

    public $dmatch;

    public function mount($id)
    {


       $this->dmatch = Matche::find($id);
    }

    public function render()
    {


        return view('livewire.delete-match',[
            'mid' => $this->dmatch->id,
        ]);
    }

    public function deletem($id)
    {
        $sel_match = Matche::find($id);

        $sel_match->delete();

        return redirect()->to('matches');
    }
}
