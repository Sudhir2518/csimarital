<x-app-layout title="Someone liked your match">
    <x-slot name="header" >
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Someone liked your match') }}
        </h2>
    </x-slot>
    <div class="mx-auto max-w-2xl p-2">


         <div class="grid grid-col-1 md:grid-cols-2 rounded-lg bg-gray-400">

            <div class="m-5 rounded-r max-w-2xl mx-auto sm:m-2 md:rounded-lg">
               <a href="" ><img src="{{ Storage::url('profile_photo/'. $user->profile_photo )}}" alt="{{ $user->first_name}}" class=" w-16 h-20 mx-10 lg:mx-0 rounded-xl md:rounded-lg" /></a>
            </div>
            <div class="text-center mt-2">
               <h2 class="text-xl  text-gray-600 font-bold font-serif ">
                <span>{{ $user->first_name }}</span>&nbsp;<span>{{ $user->last_name}}</span>

            </h2>

            <p class="text-2xl text-yellow-700 font-bold">
                {{ $user->surname}}
            </p>
            <p style="font-weight:bold;color:midnightblue;font-style:italic"><span style="font-style:normal;font-weight:bold:color:Maroon">Email:</span>{{ $user->email }}</p>
            </div>

        </div>
        <div class="w-full p-3 bg-blue-300 rounded-lg mt-4 text-center ">
            <span class="text-lg font-bold font-sans text-blue-800">Matches posted by</span>&nbsp;<span>{{ $user->first_name }}</span>&nbsp;<span>{{ $user->last_name}}</span>
        </div>
        @foreach($usermatch as $umatch)
        <div class="grid grid-col-1 md:grid-cols-2">

                <div class="pt-6">
                    <td rowspan="5"><img src="{{ Storage::url('prop_bust/'.$umatch->bust_image )}}"  ></td>
                </div>
                <div class=" pt-16 pb-16 ">
                    <table class="table-fixed w-full ml-2 border-separate border border-green-800 text-sm font-serif lg:text-lg">
                        <tr>
                            <td class="border border-green-600 text-sm font-bold font-sans text-blue-800">Match ID</td>
                            <td class="border border-green-600 font-bold text-lg font-serif text-green-800">{{ $umatch->id}}</td>
                          </tr>
                        <tr>
                            <td class="border border-green-600 text-sm font-bold font-sans text-blue-800">First Name</td>
                            <td class="border border-green-600 font-bold text-lg font-serif text-green-800">{{ $umatch->first_name}}</td>
                          </tr>
                          <tr>
                            <td class="border border-green-600 text-sm font-bold font-sans text-blue-800">Last Name</td>
                            <td class="border border-green-600 font-bold text-lg font-serif text-green-800">{{ $umatch->last_name}}</td>
                          </tr>
                          <tr>
                            <td class="border border-green-600 text-sm font-bold font-sans text-blue-800">Surname</td>
                            <td class="border border-green-600 font-bold text-lg font-serif text-green-800">{{ $umatch->surname}}</td>
                          </tr>
                          <tr>
                            <td class="border border-green-600 text-sm font-bold font-sans text-blue-800">Date of birth</td>
                            <td class="border border-green-600 font-bold text-lg font-serif text-green-800">{{ $umatch->date_of_birth}}</td>
                          </tr>

                          <tr>
                            <td class="border border-green-600 text-sm font-bold font-sans text-blue-800">Occupation</td>
                            <td class="border border-green-600 font-bold text-lg font-serif text-green-800">{{ $umatch->occupation->occu_name}}</td>
                          </tr>
                          <tr>
                            <td class="border border-green-600 text-sm font-bold font-sans text-blue-800">Place of Work</td>
                            <td class="border border-green-600 font-bold text-lg font-serif text-green-800">{{ $umatch->city->city}}</td>
                          </tr>


                    </table>
                </div>


        </div>
        @endforeach
        <p class="text-xl text-blue-800 font-bold font-sans text-center">
            <a href="{{ route('login')}}" class="text-yellow-800">Login</a> to your account for further details.
        </p>
    </div>
</x-app-layout>

