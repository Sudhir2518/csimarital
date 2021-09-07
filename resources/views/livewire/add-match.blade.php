

<div>
    <x-modal wire:model="show">
        <div class=" w-full">
            <button wire:click="$set('show', false)" class="float-right p-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

      <div>
          <x-slot name="header">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('CreateMatch') }}
              </h2>
          </x-slot>


          <div class="py-12">
              <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                  <div class="mt-10 sm:mt-0">
                      <div class="md:grid md:grid-cols-3 md:gap-6">
                          <div class="md:col-span-1">
                          <div class="px-4 sm:px-0">
                              <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $pages[$currentPage]['heading'] }}</h3>
                              <p class="mt-1 text-sm text-gray-600">{{ $pages[$currentPage]['subheading'] }}</p>
                          </div>
                          </div>
                          <div class="mt-5 md:mt-0 md:col-span-2">
                              @if ($errors->isNotEmpty())
                              @foreach ($errors->all() as $error)
                              {!! $errors->first() !!}
                           @endforeach
                                  <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                      <strong class="font-bold">Oops!</strong>
                                      <span class="block sm:inline">There are some errors with your submission.</span>
                                  </div>
                              @endif
                              @if($success)
                                  <div class="text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                      <span class="block sm:inline">success</span>
                                      <span  class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                          <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                      </span>
                                  </div>
                               @endif
                              <form wire:submit.prevent="submit" >

                                  <div class="shadow overflow-hidden sm:rounded-md">
                                      <div class="px-4 py-5 bg-white sm:p-6">
                                        @if($currentPage === 1)
                                              <div class="flex flex-col">
                                                  <div class="grid grid-col-1 space-y-10">
                                                    <div class="mx-3">
                                                      <form wire:submit.prevent="save">
                                                          <label for="bust_image">Upload a bust size image </label>
                                                          @if ($bust_image)
                                                              Photo Preview:
                                                              <img src="{{ $bust_image->temporaryUrl() }}" class="w-25 h-25 rounded-full md:w-44 h-52">
                                                          @endif

                                                          <input type="file" wire:model="bust_image">

                                                          @error('bust_image') <span class="text-xs text-red-500 mt-1" >{{ $message }}</span> @enderror


                                                      </form>
                                                    </div>
                                                    <div class="mx-3">
                                                      <form wire:submit.prevent="save">
                                                          <label for="full_image">Upload a full size image </label>
                                                          @if ($full_image)
                                                              Photo Preview:
                                                              <img src="{{ $full_image->temporaryUrl() }}" class="w-25 h-25 rounded-full md:w-44 h-52" />
                                                          @endif

                                                          <input type="file" wire:model="full_image">

                                                          @error('full_image') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror


                                                      </form>
                                                  </div>

                                                  <div class="mx-3">
                                                    <form wire:submit.prevent="save">
                                                        <label for="membership">Upload church membership certificate (jpg,png,jpeg or pdf)</label>
                                                        @if ($membership)
                                                            Photo Preview:
                                                            <img src="{{ $membership->temporaryUrl() }}" class="w-25 h-25 rounded-full md:w-44 h-52" />
                                                        @endif

                                                        <input type="file" wire:model="membership">

                                                        @error('membership') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror


                                                    </form>
                                                </div>


                                              </div>


                                                  <div class="w-full py-2">

                                                      <select wire:model.lazy="category_id" type="text"  name="category_id" id="category_id"  placehoder ="Type of match" autocomplete="category_id"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500  block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('category_id') border-red-700  @enderror">
                                                         <option value="">--select type of match---</option>
                                                            @foreach($typeofmatches as $typeofmatch)
                                                              <option value="{{ $typeofmatch->id }}">{{ $typeofmatch->match_type}}</option>
                                                            @endforeach

                                                      </select>
                                                       @error('category_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

                                                  </div>
                                                  <div class="w-full py-2">

                                                      <input wire:model.lazy="first_name" type="text" name="first_name" id="first_name" autocomplete="first_name" placeholder="First Name"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  rounded-md @error('first_name') border-red-700  @enderror">
                                                      @error('first_name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <input wire:model.lazy="last_name"  type="text" name="last_name" id="last_name" autocomplete="last_name" placeholder="Last Name"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('last_name') border-red-700  @enderror">
                                                      @error('last_name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">
                                                      <label for="surname" class="block text-sm font-medium text-gray-700">Surname</label>
                                                      <input wire:model.lazy="surname" type="text" name="surname" id="surname" autocomplete="surname" placeholder="Surname"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('surname') border-red-700  @enderror">
                                                      @error('surname') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>


                                              </div>

                                              <div class="flex flex-col">

                                                  <div class="w-full py-2">
                                                      <label for="date_of_birth" class="block text-sm font-medium text-gray-700  @error('first_name') border-red-700  @enderror">Date of birth</label>
                                                      <x-pikaday wire:model.lazy="date_of_birth" name="date_of_birth" format="YYYY-MM-DD" />
                                                      @error('date_of_birth') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

                                                    </div>
                                                  <div class="w-full py-2">

                                                    <select wire:model.lazy="place_of_birth" type="text" name="place_of_birth" id="placeOfBirth" autocomplete="place_of_birth"  placeholder="s"
                                                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('edufield_id') border-red-700  @enderror">

                                                    <option value="">-- select place of birth --</option>

                                                    @foreach($cities1 as $city1)

                                                        <option value="{{$city1->city}}">{{$city1->city }}</option>
                                                     @endforeach

                                                   </select>
                                                   @error('place_of_birth') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

                                                  </div>
                                                  <div class="w-full py-2">

                                                      <input wire:model.lazy="height"  type="text" name="height" id="height" autocomplete="height" placeholder="Height (in cm)"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('height') border-red-700  @enderror">
                                                      @error('height') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <select wire:model.lazy="eduqual_id" type="text" name="eduqual_id" id="eduqual_id" autocomplete="eduqual_id"  placeholder="Education Qualifications"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('edufield_id') border-red-700  @enderror">
                                                        <option value="">--select Education Qualifications--</option>
                                                        @foreach($eduquals as $eduqual)
                                                           <option value="{{$eduqual->id}}">{{$eduqual->eduqual_name }}</option>
                                                        @endforeach
                                                      </select>
                                                      @error('eduqual_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <select wire:model.lazy="edufield_id"  type="text" name="edufield_id" id="edufield_id" autocomplete="edufield_id"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('edufield_id') border-red-700  @enderror">
                                                          <option value="">--select Field of Education--</option>
                                                          @foreach($edufields as $edufield)
                                                             <option value="{{$edufield->id}}">{{$edufield->edufield_name }}</option>
                                                          @endforeach
                                                      </select>
                                                      @error('edufield_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <textarea  wire:model.lazy="about" name="about" styling="overflow-y-scroll h-200" id="about" autocomplete="about" placeholder="About the Bride/Bridegroom (optional)"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('about') border-red-700  @enderror"></textarea>

                                                      <span class="text-xs text-red-500 mt-1"></span>
                                                  </div>
                                               @elseif($currentPage === 2)

                                                  <div class="w-full py-2">

                                                      <input wire:model.lazy="fname" type="text" name="fname" id="fname" autocomplete="fname" placeholder="Father's name"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('fname') border-red-700  @enderror">
                                                      @error('fname') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">


                                                      <input wire:model.lazy="mname" type="text" name="mname" id="mname" autocomplete="mname" placeholder="Mother's name"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('mname') border-red-700  @enderror">
                                                      @error('mname') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <select wire:model.lazy="foccu"  type="text" name="foccu" id="fname" autocomplete="foccu"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('foccu') border-red-700  @enderror">
                                                          <option value="">--select Father's Occupation--</option>
                                                          @foreach($occupations as $occupation)
                                                             <option value="{{$occupation->occu_name}}">{{$occupation->occu_name }}</option>
                                                          @endforeach
                                                      </select>
                                                      @error('foccu') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <select wire:model.lazy="moccu"  type="text" name="moccu" id="moccu" autocomplete="moccu" placeholder = "Mother's Occupation"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('foccu') border-red-700  @enderror">
                                                          <option value="">--select Mother's Occupation--</option>
                                                          @foreach($occupations as $occupation)
                                                             <option value="{{$occupation->occu_name}}">{{$occupation->occu_name }}</option>
                                                          @endforeach
                                                      </select>
                                                      @error('moccu') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <select wire:model.lazy="sisters"  type="text" name="sisters" id="sisters" autocomplete="sisters"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('sisters') border-red-700  @enderror">
                                                          <option value="">--select no of Sisters--</option>
                                                          <option value="1 sister">no sisters</option>
                                                          <option value="1 sister">1 sister</option>
                                                          <option value="2 sisters">2 sisters</option>
                                                          <option value="3 sisters">3 sisters</option>
                                                          <option value="4 sisters">more than 3 sisters</option>
                                                      </select>
                                                      @error('sisters') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <select wire:model.lazy="brothers"  type="text" name="brothers" id="brothers" autocomplete="brothers"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('foccu') border-red-700  @enderror">
                                                          <option value="">--select no. of brothers--</option>
                                                          <option value="1 brother">no brothers</option>
                                                          <option value="1 brother">1 brother</option><option value="1 brother">1 brother</option>
                                                          <option value="2 brothers">2 brothers</option>
                                                          <option value="3 brothers">3 brothers</option>
                                                          <option value="4 brothers">more than 3 brothers</option>
                                                      </select>
                                                      @error('brothers') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">
                                                    <select wire:model.lazy="diocese_id"  type="text" name="diocese_id" id="diocese_id" autocomplete="diocese_id"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('diocese_id') border-red-700  @enderror">
                                                        <option value="">--select Diocese--</option>
                                                        @foreach($dioceses as $diocese)
                                                           <option value="{{$diocese->id}}">{{$diocese->diocese_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    {{ $diocese_id}}

                                                      @error('diocese') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <input wire:model.lazy="church"  type="text" name="church" id="church" autocomplete="church" placeholder="Church Name"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('church') border-red-700  @enderror">
                                                      @error('church') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>

                                                  <div class="w-full py-2">

                                                      <textarea wire:model.lazy="about_family" name="about_family" styling="overflow-y-scroll h-56" id="about_family" autocomplete="about_family" placeholder="About family (optional)"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('about_family') border-red-700  @enderror"></textarea>

                                                      <span class="text-xs text-red-500 mt-1"></span>
                                                  </div>
                                                  @else
                                                  <div class="w-full py-2" id="jslsjlf">

                                                      <select wire:model.lazy="occupation_id" type="text" name="occupation_id" id="occupation_id" autocomplete="occupation_id"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('occupation_id') border-red-700  @enderror">
                                                          <option value="">--select Occupation --</option>
                                                          @foreach($occupations as $occupation)
                                                             <option value="{{$occupation->id}}">{{$occupation->occu_name }}</option>
                                                          @endforeach
                                                      </select>
                                                      @error('occupation_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>

                                                  <div class="w-full py-2">

                                                      <select wire:model.lazy="designation_id"  type="text" name="designation_id" id="designation_id" autocomplete="designation_id"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('designation_id') border-red-700  @enderror">
                                                          <option value="">--select Designation--</option>
                                                          @foreach($designations as $designation)
                                                             <option value="{{$designation->id}}">{{$designation->desgn_name }}</option>
                                                          @endforeach
                                                      </select>
                                                      @error('designation_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>
                                                  <div class="w-full py-2">

                                                      <select wire:model.lazy="organization_id"  type="text" name="organization_id" id="organization_id" autocomplete="organization_id"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('organization_id') border-red-700  @enderror">
                                                          <option value="">--select Organization--</option>
                                                          @foreach($organizations as $organization)
                                                             <option value="{{$organization->id}}">{{$organization->org_name }}</option>
                                                          @endforeach
                                                      </select>
                                                      @error('organization_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                  </div>

                                                  <div class="w-full py-2">

                                                    <select wire:model.lazy="country_id"  type="text" name="country_id" id="country_id" autocomplete="country_id"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('organization_id') border-red-700  @enderror">
                                                        <option value="">--select Residential Status--</option>
                                                        @foreach($countries as $country)
                                                           <option value="{{$country->id}}">{{$country->res_status }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('organization_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>

                                                 @if($country_id == 1)
                                                  <div class="w-full py-2">

                                                    <select wire:model.lazy="state_id" type="text" name="state_id" id="state_id" autocomplete="state_id"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('state_id') border-red-700  @enderror">
                                                             <option value="" selected>--select state--</option>
                                                              @foreach($states as $state)
                                                                <option value="{{ $state->id }}">{{ $state->state}}</option>
                                                              @endforeach
                                                      </select>
                                                    
                                                      @error('state_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

                                                    </div>

                                                  <div class="w-full py-2">

                                                    <select wire:model.lazy="city_id" type="text" name="city" id="city_id" autocomplete="city_id"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2  w-full shadow-sm sm:text-sm @error('city') border-red-700  @enderror">
                                                             <option value="" selected>--select city--</option>

                                                              @foreach($cities as $city)
                                                                <option value="{{ $city->city }}">{{ $city->city}}</option>
                                                              @endforeach

                                                      </select>
                                                      @error('city_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

                                                    </div>
                                                   @elseif($country_id == 2)
                                                   <div class="w-full py-2">

                                                    <input wire:model.lazy="state_id" type="text" name="state_id" id="state_id" autocomplete="state_id" placeholder="Enter the foreign country"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  rounded-md @error('state_id') border-red-700  @enderror">
                                                    @error('state_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="w-full py-2">

                                                    <input wire:model.lazy="city_id" type="text" name="city_id" id="city_id" autocomplete="city_id" placeholder="Enter foreign city or place"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  rounded-md @error('city_id') border-red-700  @enderror">
                                                    @error('city_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                                </div>
                                                @else
                                                <div></div>
                                                @endif
                                                  @endif





                                              </div>

                                      </div>

                                      <div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            @if($currentPage === 1)
                                              <div></div>
                                             @else
                                              <button wire:click="goToPreviousPage" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                                  Back
                                              </button>
                                              @endif
                                            @if($currentPage === count($pages))
                                            <div class="flex">
                                              <x-button type="submit" class="">
                                                  Submit   {{ $progress }}
                                              </x-button >
                                              <div wire:loading.delay>
                                                <div style="color: #f4696b" class="la-timer">
                                                    <div></div>
                                                </div>
                                            </div>
                                            </div>
                                             @else
                                              <x-button wire:click="goToNextPage" type="button" class="">
                                                  Next
                                              </x-button>
                                              @endif
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    </x-modal>
</div>

