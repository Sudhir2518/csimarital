<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Education Qualifications') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <ul class="flex space-x-4">
            <x-nav-link  href="{{ route('eduquals.index') }}" :active="request()->routeIs('eduquals.index')">
                Index
            </x-nav-link>
            <x-nav-link href="{{ route('eduquals.create') }}" :active="request()->routeIs('create.create')">
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
                    <form action="{{ route('eduquals.store') }}" method="POST">
                        @csrf



                        <div>
                            <x-label for="eduqual_name" value="{{ __('Name of eduqual') }}" />
                            <x-input id="eduqual_name" class="block w-full mt-1" type="text" name="eduqual_name" :value="old('eduqual_name')" required autofocus autocomplete="desgn_name" />
                            <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                               @error('eduqual_name')<p class="text-sm text-red-600">{{$message}}</p> @enderror
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
