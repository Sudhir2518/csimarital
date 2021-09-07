<div>
   <x-modal wire:model="show">
       <div class="w-full p-2">
           <p class="mx-2 text-gray-500 font-serif text-lg ">
               Are you sure you want to send mail to inform that you
               are interested in the match  <span class="text-xl font-bold text-yellow-800" >
                   {{ $likedmatch->first_name }} &nbsp; {{ $likedmatch->last_name}}
               </span></br>
            You will be giving access to view your profile and also all the matches posted by you
           </p>
           <p>to proceed select your match and press SEND MAIL button or press CANCEL to go back</p>
        <form wire:submit.prevent="saveLike" >
            <div class="mt-3">
                <select wire:model.lazy="umatch" type="text" name="yourmatch" id="yourmatch" autocomplete="yourmatch"  placeholder="Education Qualifications"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm @error('yourmatch') border-red-700  @enderror" required>
                 <option value="">--select your matche --</option>
                 @foreach($usermatches as $usermatche)
                    <option value="{{$usermatche->id}}">{{$usermatche->first_name }}</option>
                 @endforeach
               </select>
               @error('umatch') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="mt-3  flex space-x-3">

                <x-secondery-button wire:click="$set('show', false)">CANCEL</x-secondery-button>
                <x-button >Send Mail</x-button>
                <div wire:loading.delay>
                    <div style="color: #f4696b" class="la-timer">
                        <div></div>
                    </div>
                </div>
            </div>
        </form>
       </div>
   </x-modal>
</div>
