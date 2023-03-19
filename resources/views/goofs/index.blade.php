<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('goofs.store') }}" class="mt-4">
            @csrf
            <input
                name="title"
                type="text"
                placeholder="{{ __('Enter a title for your goofy message here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-4"
            >
            <textarea
                name="body"
                placeholder="{{ __('Enter your goofy message here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('body') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Goof') }}</x-primary-button>
        </form>
        <form method="GET" action="{{ route('goofs.search') }}" class="flex flex-row gap-x-2 items-start my-4">
            @csrf
            <input
                name="searchtags"
                type="text"
                placeholder="{{ __('Search tags here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                :value="old('search')"
            >
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="flex flex-row gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                {{ __('Search') }}
            </x-primary-button>
        </form>
        @include('goofs.partials.gooflist')
    </div>
</x-app-layout>
