<div>
    <x-modal wire:model="show">
        <div class="w-full p-2">
            <p class="mx-2 text-gray-500 font-serif text-lg ">
                Are you sure you want to approve  <span class="text-xl font-bold text-yellow-800" >
                    {{ $matche->first_name }} &nbsp; {{ $matche->last_name}}
                </span></br>
            posted by <span class="text-xl font-bold text-yellow-800" >
                {{ $matche->user->first_name }} &nbsp; {{ $matche->user->last_name}}
            </span></br>
            </p>
            <p>to proceed select your match and press APPROVE button or press CANCEL to go back</p>
         <form wire:submit.prevent="approveMatch" >

             <div class="mt-3  flex space-x-3">

                 <x-secondery-button wire:click="$set('show', false)">CANCEL</x-secondery-button>
                 <x-button >APPROVE  {{ $progress}}</x-button>
             </div>
         </form>
        </div>
    </x-modal>
 </div>
