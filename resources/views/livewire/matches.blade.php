
<x-slot name="title">
    Yourmatches
</x-slot>
<x-slot name="header">
    Yourmatches

</x-slot>


<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    @if(isset($success))
    <div class="max-w-xl mx-auto text-red-800 text-xl font-bold font-serif">
           {{ $success }}
    </div>
  @endif
  @if( isset($unapproved) and $unapproved >0)
  <div class="max-w-xl mx-auto">
  <span class="text-sm text-blue-700 font-sans "> <span class=" ml-1 p-1 bg-yellow-900 rounded-full text-sm text-white font-bold mr-1">{{ $unapproved}}</span> unapproved matche/s under your account, kindly wait for the approval</span>
  </div>
  @else
  {{ ''}}
 @endif

    @if (isset($matches) and count($matches))
<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    @foreach($matches as $matche)
    <div class="grid grid-col-1 md:grid-cols-2">

        <div class="m-5 rounded-r max-w-2xl mx-auto p-2 sm:m-2 md:rounded-lg">
           <a href="{{ route('viewmatch', $matche->id)}}" ><img src="{{ Storage::url('prop_bust/'. $matche->bust_image )}}" alt="" class=" rounded-md " /></a>
        </div>

        <div class="mt-2 md:m-1 text-center">
            <h2 class="text-xl  text-gray-600 font-bold font-serif ">
                <span>{{ $matche->first_name }}</span>&nbsp;<span>{{ $matche->last_name}}</span>
            </h2>
            <p class="text-2xl text-yellow-700 font-bold">
                {{ $matche->surname}}
            </p>

           <div class="mt-2">
            <h2 class="text-md  text-gray-600 font-bold">
                {{ $matche->date_of_birth }}
            </h2>
            <h2 class="text-md  text-gray-600 font-bold">
                 {{ $matche->eduqual->eduqual_name}}
           </h2>
            <h2 class="text-md text-gray-600 font-bold">
               Posted   {{ $matche->created_at->diffForHumans()}}
            </h2>
            <h2 class="text-md  text-gray-600 font-bold">
                {{ $matche->city_id}}
            </h2>


           </div>

            <div class="mt-6">

            <a href="{{ route('editmatch',$matche->id)}}"><x-view-button >
                {{__('EDIT')}}
            </x-view-button></a>

            </div>


            <div class="grid grid-cols-1 mt-6">
                <p>toggle to allow/not allow others to view images</p>
                <div class="max-w-3xl mx-auto"><livewire:featured :matche="$matche"  :name="'featured'" :key="'featured'.$matche->id" /></div>
            </div>


        </div>
        <hr class=" bg-gray-800 mt-4 border-r-2 lg:hidden" />
    </div>

    @endforeach

</div>
<div class=" p-10 text-yellow-700lg:px-30 text-2xl divide-y divide-gray-200 text-center py-23 text-red-500">

    <div>
        <livewire:add-match/>
    </div>
    <p class=" text-lg text-yellow-500">
        click <x-button x-data="{}"  x-on:click="window.livewire.emitTo('add-match','show')" >
             Add match
        </x-button> to add one </p>
    </div>


</div>
</div>
@else
<div class="m-3 pt-10 w-full ">

    <div>
        <livewire:add-match/>
    </div>
<div class=" p-3text-yellow-700lg:px-30 text-2xl divide-y divide-gray-200 text-center py-23 text-red-500">

<p class=" text-lg text-yellow-500">
    click <x-button x-data="{}"  x-on:click="window.livewire.emitTo('add-match','show')" >
         Add match
    </x-button> to add one</p>
</div>
</div>
@endif

</div>
</div>




