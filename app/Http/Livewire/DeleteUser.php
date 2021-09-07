<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\File;

class DeleteUser extends Modal
{


    public function deleteuser()
    {
         $user = User::find(Auth::user()->id);

         File::delete(storage_path('app/public/profile_photo/' . $user->profile_photo));

         $user->delete();

         return redirect()->to('/');
    }



    public function render()
    {

        $this->user = User::find(Auth::user()->id);
        return view('livewire.delete-user',[
            'user' => $this->user,
        ]);
    }




}
