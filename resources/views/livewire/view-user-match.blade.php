<x-slot name="header">
   Details of {{ $user->first_name }} who liked your match
    </x-slot>
    @if($isliked>0)
    <ul class=" text-center p-1 bg-green-300 border-2 border-green-800 text-lg text-green-800">
      You sent sent message in respect of this match
  </ul>
@endif

    <div class=" max-w-5xl mx-auto p-3">
        <ul class=" text-center p-1 bg-yellow-400">
            <li class="text-lg lg:text-2xl font-serif font-bold text-yellow-900 "><span>{{ $user->surname}}</span>&nbsp;&nbsp;<span>{{ $user->first_name}}</span>&nbsp;&nbsp;<span>{{ $user->last_name}}</span></li>
      </ul>
      <div class="grid grid-col-1 md:grid-cols-2">

        <div class="m-5 rounded-r max-w-2xl mx-auto sm:m-2 md:rounded-lg">
            <livewire:uimage-view : uimage="{{ $user->profile_photo }}" />

            @if(isset(Auth::user()->profile_photo))
            <button x-data="{}"  x-on:click="window.livewire.emitTo('uimage-view','mshow')" >
                <span class="mr-1"><img src="{{ Storage::url('profile_photo/'. $user->profile_photo )}}"  class="  w-20 mx-10 lg:mx-0 rounded-xl md:rounded-lg" /></span>

            </button>
            @else
            <button x-data="{}"  x-on:click="window.livewire.emitTo('uimage-view','mshow')">
                <span class="mr-1"><img src="{{ Storage::url('profile_photo/dummy.jpeg')}}" class=" w-20 mx-10 lg:mx-0 rounded-xl md:rounded-lg" /></span>

            </button>
            @endif
        </div>

        <div class="mt-2 md:m-1 text-center">
            <table class="w-full border-separate border border-green-800 text-sm font-serif lg:text-lg">
                <tr>
                    <td class="border border-green-600 ">Church membership</td>
                    <td class="border border-green-600 ">{{ $user->church }}</td>

                  </tr>
                  <tr>
                    <td class="border border-green-600 ">Email</td>
                    <td class="border border-green-600 ">{{ $user->email }}</td>

                  </tr>
                  <tr>
                    <td class="border border-green-600 ">Mobile</td>
                    <td class="border border-green-600 ">{{ $user->mobile }}</td>

                  </tr>
            </table>

        </div>
        <hr class=" bg-gray-800 mt-4 border-r-2 lg:hidden" />
    </div>
        <div class="p-2 bg-blue-400 ">
            <span class="text-2xl text-yellow-900 font-sans text-center">Matche Posted by </span><span class="text-2xl text-green-900 font-sans text-center font-bold">{{ $user->first_name}}</span>
        </div>


            <ul class=" text-center p-1 bg-yellow-400">
                  <li class="text-lg lg:text-2xl font-serif font-bold text-yellow-900 "><span>{{ $matche->surname}}</span>&nbsp;&nbsp;<span>{{ $matche->first_name}}</span>&nbsp;&nbsp;<span>{{ $matche->last_name}}</span></li>
            </ul>


        <div class="m-1 space-y-4  md:m-8 text-center">
            <div class="flex flex-shrink-0 content-center">
                <div class="w-6/12 p-2">
                       <livewire:image-view : image="{{ $matche->bust_image }}" />
                    <button x-data="{}"  x-on:click="window.livewire.emitTo('image-view','show')" ><img src="{{ Storage::url('prop_bust/'.$matche->bust_image)}}" class=" w-48 h-28 lg:h-56"/></button>
                </div>
                <div class="w-6/12 p-2">
                    <livewire:fimage-view : fimage="{{ $matche->full_image }}" />
                    <button x-data="{}"  x-on:click="window.livewire.emitTo('fimage-view','show')"><img src="{{ Storage::url('prop_full/'.$matche->full_image)}}" class=" w-48 h-28 lg:h-56"/></button>
                </div>

            </div>
            <h1 class="text-xl font-bold text-gray-500">
                PERSONAL DETAILS
            </h1>
            <table class="w-full border-separate border border-green-800 text-sm font-serif lg:text-lg">

                <tbody>
                  <tr>
                    <td class="border border-green-600 ">Date of birth</td>
                    <td class="border border-green-600 ">{{ $matche->date_of_birth }}</td>

                  </tr>
                  <tr >
                    <td class="border border-green-600 ">Age</td>
                    <td class="border border-green-600 ">{{ \Carbon\Carbon::parse($matche->date_of_birth)->age }}</td>

                  </tr>
                  <tr class="border border-green-600 ">
                    <td class="border border-green-600 ">Place of Birth</td>
                    <td class="border border-green-600 ">{{ $matche->place_of_birth }}</td>

                  </tr>
                  <tr class="border border-green-600 ">
                    <td class="border border-green-600 ">Height (inch)</td>
                    <td class="border border-green-600 ">{{ $matche->height }}</td>

                  </tr>

                  <tr class="border border-green-600 ">
                    <td class="border border-green-600 ">Educational Qualifications</td>
                    <td class="border border-green-600 ">{{ $matche->eduqual->eduqual_name }}</td>
                  </tr>
                  <tr class="border border-green-600 ">
                    <td class="border border-green-600 ">Field of Education</td>
                    <td class="border border-green-600 ">{{ $matche->edufield->edufield_name }}</td>
                  </tr>
                  <tr class="border border-green-600 ">
                    <td class="border border-green-600 ">DIOCES</td>
                    <td class="border border-green-600 ">{{ $matche->diocese->diocese_name }}</td>
                  </tr>
                  <tr class="border border-green-600 ">
                    <td class="border border-green-600 ">Church Membership</td>
                    <td class="border border-green-600 ">{{ $matche->church }}</td>
                  </tr>

                  <tr class="border border-green-600 ">
                   <td colspan="2" class="border border-green-600 ">
                         <h1><span>About</span>&nbsp; <span class="text-green-500 text-xl font-bold">{{ $matche->first_name}}</span></h1>
                       {{ $matche->about}}
                   </td>
                   </tr>

                </tbody>
              </table>
              <h1 class="text-xl font-bold text-gray-500">
                FAMILY DETAILS
           </h1>
     <table class="w-full border-separate border border-green-800">

       <tbody>
         <tr>
           <td class="border border-green-600 ">Name of father</td>
           <td class="border border-green-600 ">{{ $matche->fname }}</td>

         </tr>
         <tr >
           <td class="border border-green-600 ">Name of Mother</td>
           <td class="border border-green-600 ">{{ $matche->mname }}</td>

         </tr>
         <tr class="border border-green-600 ">
           <td class="border border-green-600 ">Father's Occupation</td>
           <td class="border border-green-600 ">{{ $matche->foccu }}</td>

         </tr>
         <tr class="border border-green-600 ">
           <td class="border border-green-600 ">Mother's Occupation</td>
           <td class="border border-green-600 ">{{ $matche->moccu }}</td>

         </tr>
         <tr class="border border-green-600 ">
           <td class="border border-green-600 ">No of Brothers</td>
           <td class="border border-green-600 ">{{ $matche->brothers }}</td>

         </tr>
         <tr class="border border-green-600 ">
           <td class="border border-green-600 ">No of Sisters</td>
           <td class="border border-green-600 ">{{ $matche->sisters }}</td>
         </tr>

         <tr class="border border-green-600 ">
            <td colspan="2" class="border border-green-600 ">
                <h1><span>About</span>&nbsp; <span class="text-green-500 text-xl font-bold">{{ $matche->surname }}</span>&nbsp;<span>Family</span></h1>
                {{ $matche->about_family}}
            </td>
            </tr>

       </tbody>
     </table>
     <h1 class="text-xl font-bold text-gray-500">
        PROFESSIONAL DETAILS
    </h1>
    <table class="w-full border-separate border border-green-800">

    <tbody>
    <tr>
    <td class="border border-green-600 ">Occupation</td>
    <td class="border border-green-600 ">{{ $matche->occupation->occu_name }}</td>

    </tr>
    <tr >
    <td class="border border-green-600 ">Designation</td>
    <td class="border border-green-600 ">{{ $matche->designation->desgn_name }}</td>

    </tr>
    <tr class="border border-green-600 ">
    <td class="border border-green-600 ">Organization Name</td>
    <td class="border border-green-600 ">{{ $matche->organization->org_name }}</td>

    </tr>
    <tr class="border border-green-600 ">
    <td class="border border-green-600 ">Country of posting</td>
    <td class="border border-green-600 ">{{ $matche->country->res_status }}</td>

    </tr>
    <tr class="border border-green-600 ">
    <td class="border border-green-600 ">Place of posting</td>
    <td class="border border-green-600 ">{{ $matche->city_id }}</td>

    </tr>
    <tr class="border border-green-600 ">
    <td class="border border-green-600 ">State</td>
    <td class="border border-green-600 ">{{ $matche->state_id }}</td>
    </tr>
    </tr>



    </tbody>
    </table>

 @if(!$isliked >0)
 <div  class=" pt-20 mx-auto max-w-xl sm:px-6 lg:px-8 my-0 mb-5" >

     <livewire:send-request : liked="{{ $matche->id }}" : likedby="{{ Auth::user()->id}}"  >
     <button x-data="{}"  x-on:click="window.livewire.emitTo('send-request','show')" class="bg-indigo-800 text-white px-4 py-3 rounded-lg font-medium w-full">Send Message </button>
 </div>
@else
  <x-secondery-button>You have already sent message to this match  </x-secondery-button>


@endif
    </div>

</div>
