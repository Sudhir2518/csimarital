<div class="max-w-4xl mx-auto p-3">
    <x-modal wire:model="show">
        <div class="p-6">
       <p class="text-gray-400 font-sans font-bold text-lg">
           Are you sure you want to delete this match from  your account? if you delete , you can not restore
           click cancel or press ESC key to abort.

       </p>

       <div class="flex space-x-14">
        <x-secondery-button wire:click="$set('show', false)" >CANCEL</x-secondery-button>
        <x-danger-button wire:click="deletem({{$mid}})" >DELETE</x-danger-button>
       </div>


        </div>

    </x-modal>
   </div>

