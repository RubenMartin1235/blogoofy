<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @include('goofs.partials.goof')
        <form method="POST" action="{{ route('goofs.update') }}">
            @csrf
            @method('PUT')
            <input
                name="title"
                type="text"
                placeholder="{{ __('Enter a title for your goofy message here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-4"
                value="{{ $goof->title }}"
            >
            <textarea
                name="body"
                placeholder="{{ __('Enter your goofy message here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ $goof->body }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4">
                <x-primary-button class="">{{ __('Apply changes') }}</x-primary-button>
                <a class="btn btn-default p-2" href="{{url()->previous()}}">{{ __('Cancel changes') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
