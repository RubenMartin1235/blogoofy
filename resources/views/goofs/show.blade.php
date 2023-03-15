<x-app-layout>
    <div class="max-w-4xl mx-auto p-1 sm:p-2 lg:p-3">
        <div class="mt-3 mb-2 bg-white shadow p-1">
            @include('goofs.partials.goof')
            @include('comments.partials.commentlist')
            <form method="POST" action="{{ route('comments.store', $goof) }}">
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
    </div>
</x-app-layout>
