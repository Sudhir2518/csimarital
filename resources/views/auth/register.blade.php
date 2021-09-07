<x-app-layout title="Register">

<div  class=" pt-20 mx-auto max-w-xl sm:px-6 lg:px-8 my-0">
    <div class="max-w-xl mx-auto text-center" >
        <x-logo1 />
   </div>
            <h1 class=" p-5 text-center text-xl font-bold font-sans">REGISTER</h1>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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


            <div class="shadow overflow-hidden sm:rounded-md">

                <div class="w-full py-2">

                    <input  tabindex= "1" type="text" name="first_name" placeholder="first name" id="first_name" autocomplete="first_name" value="{{ old('first_name')}}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 text-center shadow-sm sm:text-sm  rounded-md @error('first_name') border-red-700  @enderror">
                    @error('first_name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
               </div>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">

                <div class="w-full py-2">
                    <input  tabindex= "1" type="text" name="last_name" placeholder="last name" id="last_name" autocomplete="last_name" value="{{ old('last_name')}}"
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100  text-center p-2 shadow-sm sm:text-sm  rounded-md @error('last_name') border-red-700  @enderror">
                    @error('last_name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

               </div>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">

                <div class="w-full py-2">
                    <input  tabindex= "1" type="text" name="surname" placeholder="Surname " id="surname" autocomplete="surname" :value="old('surname')" value="{{ old('surname')}}"
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('surname') border-red-700  @enderror">
                    @error('surname') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

               </div>
               <div class="w-full py-2">
                <input  tabindex= "1" type="text" name="church" placeholder="church " id="church" autocomplete="church" value="{{ old('church')}}"
                 class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('church') border-red-700  @enderror">
                @error('church') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

              </div>
              <div class="w-full py-2">
                <input  tabindex= "1" type="text" name="mobile" placeholder="enter your 10 digit mobile number " id="mobile" autocomplete="mobile" value="{{ old('mobile')}}"
                 class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('mobile') border-red-700  @enderror">
                @error('mobile') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

              </div>
              <div class="w-full py-2">
                <input  tabindex= "1" type="email" name="email" placeholder="email " id="email" autocomplete="email" value="{{ old('email')}}"
                 class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

              </div>
              <div class="w-full py-2">
                <input  tabindex= "1" type="password" name="password" placeholder="password " id="password" autocomplete="password"
                 class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password') border-red-700  @enderror">
                @error('password') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

              </div>
              <div class="w-full py-2">
                <input  tabindex= "1" type="password" name="password_confirmation" placeholder=" retype the password " id="password_confirmation" autocomplete="password_confirmation"
                 class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">
                @error('password_confirmation') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

              </div>
              <div class="w-full py-2">
                <div class="flex items-center">
                    <input type="checkbox" name="agree_to_terms_and_conditions" value=1  id="agree" class="mr-2">

                    <label for="agree_to_terms_and_conditions">I agree to the <a href="{{ route('terms')}}" class="text-sm font-bold text-blue-900">terms,conditions and privacy policy</a> of this website namely CSIMarita.in</label>
                    @error('agree_to_terms_and_conditions') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
              </div>


              <div >
                <button type="submit" class="bg-green-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>

            </div>
            </div>
    </form>


</div>
</x-app-layout>
