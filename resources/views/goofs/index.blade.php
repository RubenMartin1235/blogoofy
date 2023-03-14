<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('goofs.store') }}">
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
        @include('goofs.partials.gooflist')
    </div>
</x-app-layout>
