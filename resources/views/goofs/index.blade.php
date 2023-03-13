<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('goofs.store') }}">
            @csrf
            <input
                name="title"
                type="text"
                placeholder="{{ __('Enter a title for your goofy message here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-4"
            >{{ old('title') }}
            <textarea
                name="body"
                placeholder="{{ __('Enter your goofy message here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('body') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Goof') }}</x-primary-button>
        </form>
        @foreach ($goofs as $goof)
        <div class="row mt-4 mb-4">
            <div class="row media">
                <div class="col-4">
                    <a class="text-gray-700 text-lg" href="{{ route('goofs.show', $goof) }}">{{$goof->title}}</a>
                    <a class="text-gray-700 text-lg" href="{{ route('users.show', $goof->user) }}">{{$goof->user->name}}</a>
                </div>
                <p class="text-gray-500 text-sm">{{$goof->body}}</p>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
