<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @include('comments.partials.comment')
        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
            @csrf
            @method('PUT')
            <textarea
                name="body"
                placeholder="{{ __('Enter your goofy comment here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm"
            >{{ $comment->body }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4">
                <x-primary-button class="">{{ __('Apply changes') }}</x-primary-button>
                <a class="btn btn-default p-2" href="{{url()->previous()}}">{{ __('Cancel changes') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
