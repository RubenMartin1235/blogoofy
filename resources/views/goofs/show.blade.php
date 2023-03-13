<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-4 mb-4">
            <div class="media">
                <a class="text-gray-800 text-xl" href="{{ route('goofs.show', $goof) }}">{{$goof->title}}</a>
                <p class="text-gray-500 text-sm">{{$goof->body}}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <textarea
                name="body"
                placeholder="{{ __('Enter a comment here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Comment') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
