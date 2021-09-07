<div>

<x-app-layout  title="matches-admin">


    <div  class=" pt-11">
        <x-slot name="header" >
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('List of matches posted by users') }}
            </h2>
        </x-slot>




        <div class="mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
            <x-ui.alert />
        </div>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-scroll bg-white shadow-xl sm:rounded-lg">

                    <table class="w-full divide-y divide-gray-200">

                        <thead class="font-bold text-gray-500 bg-indigo-200">
                            <tr>
                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                  Bust Image
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                 Full Image
                                </th>


                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                   First_name
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Last_name
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                   Surname
                                </th>
                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Date of birth
                                 </th>
                                 <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Church Membership
                                 </th>
                                 <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                   Posted by
                                 </th>
                                 <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Date Created
                                 </th>
                                 <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Approved
                                 </th>
                                 <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Actions
                                 </th>
                            </tr>
                        </thead>

                        <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">
                            @foreach ($matches as $matche)

                             <tr @if($matche->isApproved)
                                class="bg-green-300 border-2 border-green-800";

                                  @endif>
                                <td class="px-2 py-4 whitespace-nowrap">
                                </td>

                                <td class="px-2 py-4 whitespace-nowrap">
                                    @if($matche->bust_image)
                                    <img src= "{{ Storage::url('prop_bust/'.$matche->bust_image) }}" class=" w-9 h-10" />
                                    @else
                                    <img src= "{{ Storage::url('profile_photo/dummy.jpeg') }}" class=" w-9 h-10" />
                                    @endif
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    @if($matche->full_image)
                                    <img src= "{{ Storage::url('prop_full/'.$matche->full_image) }}" class=" w-9 h-10" />
                                    @else
                                    <img src= "{{ Storage::url('profile_photo/dummy.jpeg') }}" class=" w-9 h-10" />
                                    @endif
                                </td>

                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $matche->first_name }}
                                </td>



                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $matche->last_name }}
                                </td>

                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $matche->surname }}
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $matche->date_of_birth }}
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $matche->church }}
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap text-lg font-bold">
                                    {{ $matche->user->first_name }}&nbsp;{{ $matche->user->last_name}}&nbsp;{{ $matche->user->surname}}
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $matche->created_at->diffForHumans() }}
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    @if($matche->isApproved)
                                    {{ __('Yes') }}
                                    @else
                                    {{ __('No')}}
                                    @endif
                                </td>

                                <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">

                                    <div class="flex justify-start space-x-1">


                                        <a href="{{ route('viewadminmatch',$matche->id)}}" >
                                            <x-view-button >
                                                {{ __('VIEW')}}
                                            </x-view-button>
                                        </a>

                                        <form action="" method="POST">
                                            @csrf
                                            @method('Delete')

                                             <x-danger-button >
                                                 {{ __('DELETE')}}
                                             </x-danger-button>

                                        </form>

                                    </div>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </x-app-layout>



</div>
