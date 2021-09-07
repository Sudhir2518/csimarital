<div>
    <x-modal wire:model="show">
      <div class="max-w-3xl p-2 mx-auto"  >
        <div class=" w-full">
            <button wire:click="$set('show', false)" class="float-right p-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
          <img src="{{ Storage::url('prop_bust/'. $image )}}" class="w-full" />
    </div>
    </x-modal>
   </div>

