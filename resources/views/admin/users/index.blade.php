
<x-app-layout  title="Members">


    <div  class=" pt-11">
        <x-slot name="header" >
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('List of members/subscribers') }}
            </h2>
        </x-slot>
        <x-slot name="nav" >
            <ul class="flex space-x-4">
                <x-nav-link  href="{{ route('members') }}" :active="request()->routeIs('members')">
                    Index
                </x-nav-link>

            </ul>
        </x-slot>



        <div class="mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
            <x-ui.alert />
        </div>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                    <table class="w-full divide-y divide-gray-200">

                        <thead class="font-bold text-gray-500 bg-indigo-200">
                            <tr>
                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    ProfilePhoto
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                  First Name
                                </th>


                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Last Name
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Surname
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">
                            @foreach ($users as $user)

                             <tr>
                                <td class="px-2 py-4 whitespace-nowrap">
                                </td>

                                <td class="px-2 py-4 whitespace-nowrap">
                                    @if($user->profile_photo)
                                    <img src= "{{ Storage::url('profile_photo/'.$user->profile_photo) }}" class=" w-9 h-10" />
                                    @else
                                    <img src= "{{ Storage::url('profile_photo/dummy.jpeg') }}" class=" w-9 h-10" />
                                    @endif
                                </td>

                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $user->first_name }}
                                </td>



                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $user->last_name }}
                                </td>

                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $user->surname }}
                                </td>

                                <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">

                                    <div class="flex justify-start space-x-1">


                                        <a href="{{ route('view.user',$user->id)}}" >
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


