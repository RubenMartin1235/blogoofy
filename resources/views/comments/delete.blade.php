<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @include('comments.partials.comment')
        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
            @csrf
            @method('DELETE')
            <p class="">{{__('Are you sure that you wish to delete this comment?')}}</p>
            <p class="">{{__('THIS ACTION IS PERMANENT.')}}</p>
            <div class="mt-4">
                <x-primary-button class="">{{ __('Confirm') }}</x-primary-button>
                <a class="btn btn-default p-2" href="{{url()->previous()}}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
