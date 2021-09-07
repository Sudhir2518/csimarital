<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Matche;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ViewMatch extends Component
{

   public $matche;
   public $age;
   protected $likes;





    public function mount($id)
    {
        $this->matche = Matche::find($id);
        $this->likes = Like::where('matche_id','=',$id)->get();
    }

    public function render(Matche $matche)
    {

        if($this->matche->user_id === Auth::user()->id){
            return view('livewire.view-match', compact('matche'),[
                'likes' => $this->likes,
            ]);

        }else{
           dd("YOU ARE NOT AUTHORIZED TO VISIT THIS PAGE");
        }

    }

    public function matchage()
    {
        $this->age = Carbon::parse($this->matche['date_of_birth'])->age;
    }
}
