<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Organizations') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <ul class="flex space-x-4">
            <x-nav-link  href="{{ route('organizations.index') }}" :active="request()->routeIs('organizations.index')">
                Index
            </x-nav-link>
            <x-nav-link href="{{ route('organizations.create') }}" :active="request()->routeIs('create.create')">
                Create
            </x-nav-link>
        </ul>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
                    <x-ui.alert />
                </div>
                <div class="p-6">
                    <form action="{{ route('organizations.store') }}" method="POST">
                        @csrf



                        <div>
                            <x-label for="org_name" value="{{ __('Name of Organization') }}" />
                            <x-input id="org_name" class="block w-full mt-1" type="text" name="org_name" :value="old('org_name')" required autofocus autocomplete="desgn_name" />
                            <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                               @error('org_name')<p class="text-sm text-red-600">{{$message}}</p> @enderror
                        </div>

                        <x-button class="mt-12">
                            {{ __('Create') }}
                        </x-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
