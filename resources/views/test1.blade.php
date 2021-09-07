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
          {{ __('Create a new Match under your account') }}
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
                                                      <img src="{{ $bust_image->temporaryUrl() }}" class="w-25 h-25 rounded-full md:w-70 md:h-70">
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
                                                      <img src="{{ $full_image->temporaryUrl() }}" class="w-25 h-25 rounded-full md:w-70 md:h-70" />
                                                  @endif

                                                  <input type="file" wire:model="full_image">

                                                  @error('full_image') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror


                                              </form>
                                          </div>


                                      </div>


                                          <div class="w-full py-2">
                                              <label for="category_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Type of Match</label>
                                              <select wire:model.lazy="category_id" type="text" name="category_id" id="category_id" autocomplete="category_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">>
                                                 <option value="">--select---</option>
                                                    @foreach($typeofmatches as $typeofmatch)
                                                      <option value="{{ $typeofmatch->id }}">{{ $typeofmatch->match_type}}</option>
                                                    @endforeach

                                              </select>
                                               @error('category_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

                                          </div>
                                          <div class="w-full py-2">
                                              <label for="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">First_name</label>
                                              <input wire:model.lazy="first_name" tabindex= "1" type="text" name="first_name" id="first_name" autocomplete="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('first_name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">last_name</label>
                                              <input wire:model.lazy="last_name" tabindex= "2" type="text" name="last_name" id="last_name" autocomplete="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('last_name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="surname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Surname</label>
                                              <input wire:model.lazy="surname" tabindex= "3" type="text" name="surname" id="surname" autocomplete="surname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('surname') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>




                                      </div>

                                      <div class="flex flex-col">

                                          <div class="w-full py-2">
                                              <label for="date_of_birth" class="block text-sm font-medium text-gray-700  @error('first_name') border-red-700  @enderror">Date of birth</label>
                                              <input wire:model.lazy="date_of_birth" tabindex= "4" type="date" name="date_of_birth" id="date_of_birth" role="tab" autocomplete="date_of_birth" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('date_of_birth') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

                                            </div>
                                          <div class="w-full py-2">
                                              <label for="place_of_birth" class="block text-sm font-medium text-gray-700 @error('first_name') border-red-700  @enderror">Place of birth</label>
                                              <input wire:model.lazy="place_of_birth" tabindex= "5" type="text" name="heightplace_of_birth" id="place_of_birth" role="tab"  autocomplete="place_of_birth" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('place_of_birth') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="height" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Height (in cms)</label>
                                              <input wire:model.lazy="height" tabindex= "6" type="text" name="height" id="height" role="tab" autocomplete="height" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('height') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="eduqual_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">eduqual_id Qualifications</label>
                                              <select wire:model.lazy="eduqual_id" tabindex= "7" type="text" role="tab"  name="eduqual_id" id="eduqual_id" role="tab"  autocomplete="eduqual_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                <option value="">--select--</option>
                                                @foreach($eduquals as $eduqual)
                                                   <option value="{{$eduqual->id}}">{{$eduqual->eduqual_name }}</option>
                                                @endforeach
                                              </select>
                                              @error('eduqual_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="edufield_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Field of Education</label>
                                              <select wire:model.lazy="edufield_id"  type="text" name="edufield_id" id="edufield_id"  role="tab" autocomplete="edufield_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                  <option value="">--select--</option>
                                                  @foreach($edufields as $edufield)
                                                     <option value="{{$edufield->id}}">{{$edufield->edufield_name }}</option>
                                                  @endforeach
                                              </select>
                                              @error('edufield_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="about" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">About the propspective bride/bridegroom (optional)</label>
                                              <textarea  wire:model.lazy="about" name="about" styling="overflow-y-scroll h-56" id="about" autocomplete="about" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">

                                              <span class="text-xs text-red-500 mt-1"></span>
                                          </div>
                                       @elseif($currentPage === 2)

                                          <div class="w-full py-2">
                                              <label for="fname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Father's name</label>
                                              <input wire:model.lazy="fname" type="text" name="fname" id="fname" autocomplete="fname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('fname') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="mname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Mother's name</label>
                                              <input wire:model.lazy="mname" type="text" name="mname" id="mname" autocomplete="mname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('mname') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="foccu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Father's Occupation</label>
                                              <select wire:model.lazy="foccu"  type="text" name="fname" id="fname" autocomplete="fname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                  <option value="">--select--</option>
                                                  @foreach($occupations as $occupation)
                                                     <option value="{{$occupation->id}}">{{$occupation->occu_name }}</option>
                                                  @endforeach
                                              </select>
                                              @error('foccu') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="moccu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Mother's occupation</label>
                                              <select wire:model.lazy="moccu"  type="text" name="moccu" id="moccu" autocomplete="moccu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                  <option value="">--select--</option>
                                                  @foreach($occupations as $occupation)
                                                     <option value="{{$occupation->id}}">{{$occupation->occu_name }}</option>
                                                  @endforeach
                                              </select>
                                              @error('moccu') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="sisters" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Number of Sisters</label>
                                              <select wire:model.lazy="sisters"  type="text" name="sisters" id="sisters" autocomplete="sisters" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                  <option value="">--select--</option>
                                                  <option value="1 sister">no sisters</option>
                                                  <option value="1 sister">1 sister</option>
                                                  <option value="2 sisters">2 sisters</option>
                                                  <option value="3 sisters">3 sisters</option>
                                                  <option value="4 sisters">more than 3 sisters</option>
                                              </select>
                                              @error('sisters') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="brothers" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">No of brothers</label>
                                              <select wire:model.lazy="brothers"  type="text" name="brothers" id="brothers" autocomplete="brothers" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                  <option value="">--select--</option>
                                                  <option value="1 brother">no brothers</option>
                                                  <option value="1 brother">1 brother</option><option value="1 brother">1 brother</option>
                                                  <option value="2 brothers">2 brothers</option>
                                                  <option value="3 brothers">3 brothers</option>
                                                  <option value="4 brothers">more than 3 brothers</option>
                                              </select>
                                              @error('brothers') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="diocese" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Diocese name</label>
                                              <input wire:model.lazy="diocese" type="text" name="diocese" id="diocese" autocomplete="diocese" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('diocese') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="church" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Church name</label>
                                              <input wire:model.lazy="church"  type="text" name="church" id="church" autocomplete="church" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('church') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>

                                          <div class="w-full py-2">
                                              <label for="about_family" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">About Family (optional)</label>
                                              <textarea wire:model.lazy="about_family" name="about_family" styling="overflow-y-scroll h-56" id="about_family" autocomplete="about_family" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">

                                              <span class="text-xs text-red-500 mt-1"></span>
                                          </div>
                                          @else
                                          <div class="w-full py-2" id="jslsjlf">
                                              <label for="occupation_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror"> Occupation</label>
                                              <select wire:model.lazy="occupation_id" type="text" name="occupation_id" id="occupation_id" autocomplete="occupation_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                  <option value="">--select--</option>
                                                  @foreach($occupations as $occupation)
                                                     <option value="{{$occupation->id}}">{{$occupation->occu_name }}</option>
                                                  @endforeach
                                              </select>
                                              @error('occupation_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>

                                          <div class="w-full py-2">
                                              <label for="designation_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Designation </label>
                                              <select wire:model.lazy="designation_id"  type="text" name="designation_id" id="designation_id" autocomplete="designation_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                  <option value="">--select--</option>
                                                  @foreach($designations as $designation)
                                                     <option value="{{$designation->id}}">{{$designation->desgn_name }}</option>
                                                  @endforeach
                                              </select>
                                              @error('designation_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="organization_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Organization name</label>
                                              <select wire:model.lazy="organization_id"  type="text" name="organization_id" id="organization_id" autocomplete="organization_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                  <option value="">--select--</option>
                                                  @foreach($organizations as $organization)
                                                     <option value="{{$organization->id}}">{{$organization->org_name }}</option>
                                                  @endforeach
                                              </select>
                                              @error('organization_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="country_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Residential Status</label>
                                              <select wire:model.lazy="country_id" type="text" name="country_id" id="country_id" autocomplete="country_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                                     <option value="">--select--</option>
                                                      @foreach($res_states as $res_state)
                                                        <option value="{{ $res_state->id }}">{{ $res_state->res_status}}</option>
                                                      @endforeach
                                              </select>
                                              @error('country_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror

                                          </div>
                                          <div class="w-full py-2">
                                              <label for="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">Place of working</label>
                                              <input wire:model.lazy="city"  type="text" name="city" id="city" autocomplete="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('city') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>
                                          <div class="w-full py-2">
                                              <label for="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('password_confirmation') border-red-700  @enderror">State name</label>
                                              <input wire:model.lazy="state" type="text" name="state" id="state" autocomplete="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full bg-gray-100 p-2 shadow-sm sm:text-sm  text-center  rounded-md @error('email') border-red-700  @enderror">
                                              @error('state') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                          </div>

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
                                      <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                          Submit
                                      </button >
                                     @else
                                      <button wire:click="goToNextPage" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                          Next
                                      </button>
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
