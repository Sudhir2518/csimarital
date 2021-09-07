<x-app-layout title="Update Profile">


<div  class=" pt-20 mx-auto max-w-xl sm:px-6 lg:px-8 my-0">
            <h1 class=" p-5 text-center text-xl font-bold font-sans">UPDATE YOUR PROFILE INFORMATION</h1>
            <div class="mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
                <x-ui.alert />
            </div>

    <form method="POST" action="{{ route('profiler') }}" enctype="multipart/form-data">
                @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="profile_photo" class="p-2 font-sans text-gray-500 pb-4">Choose your profile picture</label>
                        <input type="file" name="profile_photo" placeholder="Choose profile_photo" id="profile_photo">
                          @error('profile_photo')
                          <div class="alert alert-danger mt-1 mb-1 text-red-500">{{ $message }}</div>
                          @enderror
                    </div>

                </div>

                <div class="col-md-12 mb-2">
                    <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/profile_photos/product_profile_photo_not_found.gif"
                        alt="" style="max-height: 250px">
                </div>

            </div>

            <div>
                <label for="profile_photo" class="p-2 font-sans text-gray-500 pb-4">Present Profile picture</label>
                @if($user->profile_photo)
                    <img id="preview-image-before-upload" src="{{ Storage::url('profile_photo/'.$user->profile_photo )}}"
                    alt="" style="max-width: 250px;max-height: 250px">
                @endif

            </div>


            <div class="shadow overflow-hidden sm:rounded-md">

                <div class="w-full py-2">

                    <input  tabindex= "1" type="text" name="first_name" placeholder="first name"  id="first_name" autocomplete="first_name" value="{{ $user->first_name}}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 text-center shadow-sm sm:text-sm  rounded-md @error('first_name') border-red-700  @enderror">
                    @error('first_name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
               </div>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">

                <div class="w-full py-2">
                    <input  tabindex= "1" type="text" name="last_name" placeholder="last name" id="last_name" autocomplete="last_name" value="{{ $user->last_name }}"
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100  text-center p-2 shadow-sm sm:text-sm  rounded-md @error('last_name') border-red-700  @enderror">
                    @error('last_name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

               </div>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">

                <div class="w-full py-2">
                    <input  tabindex= "1" type="text" name="surname" placeholder="Surname " id="surname" autocomplete="surname" :value="old('surname')" value="{{ $user->surname }}"
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('surname') border-red-700  @enderror">
                    @error('surname') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

               </div>
               <div class="w-full py-2">
                <input  tabindex= "1" type="text" name="church" placeholder="church " id="church" autocomplete="church" value="{{ $user->church }}"
                 class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('church') border-red-700  @enderror">
                @error('church') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

              </div>
              <div class="w-full py-2">
                <input  tabindex= "1" type="text" name="mobile" placeholder="mobile " id="mobile" autocomplete="mobile" value="{{ $user->mobile }}"
                 class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('mobile') border-red-700  @enderror">
                @error('mobile') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

              </div>
              <div class="w-full py-2">
                <input  tabindex= "1" type="email" name="email" placeholder="email " id="email" autocomplete="email" value="{{ $user->email }}"
                 class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

              </div>



              <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update Profile</button>
            </div>
            </div>
    </form>


</div>


<div  class=" pt-20 mx-auto max-w-xl sm:px-6 lg:px-8 my-0">
    <h1 class=" p-5 text-center text-xl font-bold font-sans">UPDATE YOUR PASSWORD </h1>

<form method="POST" action="{{ route('changepw')}}" >
        @csrf

      <div class="w-full py-2">

        <input  tabindex= "1" type="password" name="password" placeholder="password " id="password" autocomplete="password"
         class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password') border-red-700  @enderror">
        @error('password') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

      </div>
      <div class="w-full py-2">
        <input  tabindex= "1" type="password" name="password_confirmation" placeholder="password_confirmation " id="password_confirmation" autocomplete="password_confirmation"
         class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">
        @error('password_confirmation') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

      </div>


      <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update Password</button>
    </div>
    </div>
</form>


</div>
<div>

</div>

<livewire:delete-user />

<div  class=" pt-20 mx-auto max-w-xl sm:px-6 lg:px-8 my-0 mb-5" >


    <button x-data="{}"  x-on:click="window.livewire.emitTo('delete-user','show')" class="bg-red-500 text-white px-4 py-3 rounded font-medium w-full">DELETE YOUR ACCOUNT</button>
</div>
</x-app-layout>
