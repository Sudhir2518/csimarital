
<div>
 <x-modal wire:model="show">
     <div class="p-6">
    <p class="text-gray-400 font-sans font-bold text-lg">
        Are you sure you want to delete your account? if you delete your account you
        will lose all your content including the matches you posted. If want to proceed, you can
        click DELETE ACCOUNT button or else press ESC key to cancel.
    </p>

    <button wire:click="deleteuser()" class="p-4 bg-red-700 text-white">DELETE YOUR ACCOUNT</button>

     </div>

 </x-modal>
</div>





