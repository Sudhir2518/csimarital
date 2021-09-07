<x-app-layout title="View User">

    <div  class=" pt-20 mx-auto max-w-2xl sm:px-6 lg:px-8 my-0">
        <div class="py-12">

                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                    <table class="table-fixed w-full divide-y divide-gray-200">

                        <tr>
                            <td colspan="2" class="p-3">
                                @if($user->profile_photo)
                                <img src="{{ Storage::url('profile_photo/'.$user->profile_photo )}}" class=" w-48 h-52 mx-auto" />
                                @else
                                <img src="{{ Storage::url('profile_photo/dummy.jpEg' )}}" class=" w-48 h-52 mx-auto" />
                                @endif

                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-2xl  text-blue-900 font-serif font-bold p-8 text-center">
                                <span>{{ $user->first_name}}</span>&nbsp;&nbsp;<span>{{ $user->last_name}}</span>&nbsp;&nbsp;<span>{{ $user->surname}}</span>
                            </td>
                        </tr>

                         <tr class=" bg-gradient-to-tr from-blue-300 to-yellow-200">
                            <td class="px-2 py-4 font-bold whitespace-nowrap text-xl font-sans text-blue-800">
                                Email
                            </td>

                            <td class="px-2 py-4 whitespace-nowrap text-xl font-sans text-gray-800">
                                 {{ $user->email}}
                            </td>
                         </tr>
                         <tr class=" bg-gradient-to-tr from-blue-300 to-yellow-200">
                            <td class="px-2 py-4 font-bold whitespace-nowrap text-xl font-sans text-blue-800">
                                Church
                            </td>

                            <td class="px-2 py-4 whitespace-nowrap text-xl font-sans text-gray-800">
                                 {{ $user->church}}
                            </td>
                         </tr>



                    </table>
                </div>

        </div>
    </div>

    </x-app-layout>
