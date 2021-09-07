
<x-app-layout>
  <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Education Qualifications') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Index --}}
            <x-nav-link href="{{ route('edufields.index') }}" :active="request()->routeIs('edufields.index')">
                {{ __('Index') }}
            </x-nav-link>

            {{-- Create --}}
            <x-nav-link href="{{ route('edufields.create') }}" :active="request()->routeIs('edufields.create')">
                {{ __('Create') }}
            </x-nav-link>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <form action="{{ route('edufields.update', $edufield) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="edufield_name" value="{{ __('edufield Name') }}" />
                            <x-input id="edufield_name" class="block w-full mt-1" type="text" name="edufield_name" :value="$edufield->edufield_name" required autofocus autocomplete="edufield_name" />
                            <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                            @error('edufield_name')<p class="text-sm text-red-600">{{$message}}</p> @enderror
                        </div>

                        <x-button class="mt-12">
                            {{ __('Update') }}
                        </x-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
