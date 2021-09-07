<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Matche;

class Featured extends Component
{

    public Matche $matche;
    public string $name;
    public bool $featured;

    public function mount()
    {
        $this->featured = $this->matche->getAttribute('featured');
    }
    public function render()
    {
        return view('livewire.featured');
    }


    public function updating($name, $value)
    {

        $this->matche->setAttribute($name, $value)->save();
    }
}
