
<x-slot name="title">
    Browse Matches
</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recently added matches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  @if(isset($alert))
                    <div class="max-w-xl mx-auto text-red-800 text-xl font-bold font-serif">
                           {{ $alert }}
                    </div>
                  @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 lg:py-12">

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-2">
            @foreach($matches as $match)
            <div class="grid grid-col-1 md:grid-cols-2 border-yellow-800 rounded-lg ">

                <div class="m-5 rounded-r max-w-2xl mx-auto sm:m-2 md:rounded-lg">
                    @if($match->featured)
                   <a href="{{ route('viewonematch', $match->id)}}"><img src="{{ Storage::url('prop_bust/'.$match->bust_image )}}" alt=""  /></a>
                    @else
                    <a href="{{ route('viewonematch', $match->id)}}"><img src="{{ asset('images/dummy.jpg')}}" alt=""  /></a>
                    @endif
                </div>

                <div class="mt-2 md:m-2  text-center p-3 whitespace-nowrap ">
                    <h2 class="text-xl  text-gray-600 font-bold font-fira">
                        <span>{{ $match->first_name }}</span><span>{{ $match->last_name}}</span>
                    </h2>
                    <p class="text-3xl text-yellow-700 font-bold font-allison">
                        {{ $match->surname}}
                    </p>

                   <div class="mt-2">
                    <h2 class="text-md  text-gray-600 font-bold">
                        {{ \Carbon\Carbon::parse($match->date_of_birth)->age }} yrs
                    </h2>
                    <h2 class="text-md  text-gray-600 font-bold">
                        {{ $match->eduqual->eduqual_name}}
                   </h2>
                    <h2 class="text-md text-gray-600 font-bold">
                         {{ $match->occupation->occu_name}}
                    </h2>
                    <h2 class="text-md  text-gray-600 font-bold">
                        {{ $match->city_id}}
                    </h2>
                   </div>
                     <div class="mt-2">
                         <span class="text-xs font-bold text-blue-900">Posted By</span></br><span class="text-sm text-red-900">{{ $match->user->first_name }}</span>&nbsp;<span class="text-sm text-red-900">{{ $match->user->last_name }}</span></br><span class=" font-bold text-xs text-gray-400">{{ $match->created_at->diffForHumans() }}</span>


                     </div>
                     <div class="mt-2">
                         <a href="{{ route('viewonematch', $match->id )}}"><x-view-button >View</x-view-button></a>
                     </div>
                </div>
            </div>
           @endforeach

        </div>
        </div>


            </div>
    </div>






