<x-app-layout title="Forgot Password" >

<div  class=" pt-20 mx-auto max-w-xl sm:px-6 lg:px-8 my-0">
            <h1 class=" p-5 text-center text-xl font-bold font-sans">FORGOT PASSWORD</h1>
            <p class="font-bold text-sm text-gray-700 font-sans p-5">Kindly enter you email address to receive reset password link</p>
            <div class="mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
                <x-ui.alert />
            </div>

    <form method="POST" action="{{ route('forgotem') }}" >
                @csrf

              <div class="w-full py-2">
                <input  tabindex= "1" type="email" name="email" placeholder="email " id="email" autocomplete="email" value="{{ old('email')}}"
                 class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

              </div>





              <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
            </div>
            </div>

    </form>


</div>
</x-app-layout>
