<x-app-layout title="Reset Password">

<div  class=" pt-20 mx-auto max-w-xl sm:px-6 lg:px-8 my-0">
            <h1 class=" p-5 text-center text-xl font-bold font-sans">RESET YOUR PASSWORD</h1>

    <form method="POST" action="{{ route('resetp') }}" enctype="multipart/form-data">
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

                  <input type="hidden" name="user_id"  value="{{ $user_id }}" />

              <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
            </div>
            </div>
    </form>


</div>
</x-app-layout>
