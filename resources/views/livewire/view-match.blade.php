<x-slot name="header">
  Profile View
  </x-slot>
  <div class=" max-w-5xl mx-auto p-3">
  
          <ul class=" text-center p-1 bg-yellow-400">
                <li class="text-lg lg:text-2xl font-serif font-bold text-yellow-900 "><span>{{ $matche->surname}}</span>&nbsp;&nbsp;<span>{{ $matche->first_name}}</span>&nbsp;&nbsp;<span>{{ $matche->last_name}}</span></li>
          </ul>
  
  
      <div class="m-1 space-y-4  md:m-8 text-center">
          <div class="flex flex-shrink-0 content-center">
              <div class="w-6/12 p-2">
                     <livewire:image-view : image="{{ $matche->bust_image }}" />
                  <button x-data="{}"  x-on:click="window.livewire.emitTo('image-view','show')" ><img src="{{ Storage::url('prop_bust/'.$matche->bust_image)}}" class=" w-40 h-44 lg:w-48 lg:h-52"/></button>
              </div>
              <div class="w-6/12 p-2">
                  <livewire:fimage-view : fimage="{{ $matche->full_image }}" />
                  <button x-data="{}"  x-on:click="window.livewire.emitTo('fimage-view','show')"><img src="{{ Storage::url('prop_full/'.$matche->full_image)}}" class=" w-40 h-44 lg:w-48 lg:h-52"/></button>
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
                  <td class="border border-green-600 ">{{ $matche->place_of_birth}}</td>
  
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
         <td class="border border-green-600 ">{{ $matche->mname}}</td>
  
       </tr>
       <tr class="border border-green-600 ">
         <td class="border border-green-600 ">Father's Occupation</td>
         <td class="border border-green-600 ">{{ $matche->occupation->occu_name }}</td>
  
       </tr>
       <tr class="border border-green-600 ">
         <td class="border border-green-600 ">Mother's Occupation</td>
         <td class="border border-green-600 ">{{ $matche->occupation->occu_name }}</td>
  
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
  <td class="border border-green-600 ">{{ $matche->city_id}}</td>
  
  </tr>
  <tr class="border border-green-600 ">
  <td class="border border-green-600 ">State</td>
  <td class="border border-green-600 ">{{ $matche->state_id}}</td>
  </tr>
  </tr>
  
  
  
  </tbody>
  </table>
  @if(isset($likes))
  <h1 class="text-xl font-bold text-gray-500">
     LIKED BY
  </h1>
  
  
  
     
  
  
     
        @foreach($likes as $like)
        <a href="{{ route('viewusermatch',[$like->user_id,$like->liked_user_match,$like->token]) }}"> 
          <div class="border border-green-600 p-2 text-2xl rouned-lg font-bold  text-center bg-green-500 text-green-900 mb-2">
             {{ $like->user->first_name  }}&nbsp;{{$like->user->last_name}}
          </div></a>
  
          @endforeach
  
  
  
  </table>
 
  @endif
  </div>
  
  </div>
  