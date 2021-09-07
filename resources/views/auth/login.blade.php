<x-app-layout title="Login">


<div  class=" pt-20 mx-auto max-w-xl sm:px-6 lg:px-8 my-0">
       <div class="max-w-xl mx-auto text-center" >
            <x-logo1 />
       </div>
       <div class="max-w-xl mx-auto text-center">
           <x-ui.alert />
       </div>
            <h1 class=" p-5 text-center text-xl font-bold font-sans">LOGIN</h1>

    <form method="POST" action="{{ route('user.validate') }}" >
                @csrf

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
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember me</label>
                </div>
              </div>



              <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
            </div>
            <a href="{{ route('forgotp') }}" class="text-sm text-blue-500 font-sans font-bold p-4 "> Forgot password</a>
            </div>

    </form>


</div>
</x-app-layout>
