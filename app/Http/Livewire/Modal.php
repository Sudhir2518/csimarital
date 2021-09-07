<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
      public $show = false;
      public $mshow = false;

      protected $listeners = [
          'show' => 'showModal',
          'mshow' => 'mshowModal',

      ];

      public function showModal()
      {
          $this->show = true;
      }

      public function mshowModal()
      {
          $this->mshow = true;
      }




}
