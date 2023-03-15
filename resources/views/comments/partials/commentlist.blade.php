<div class="mt-3 mb-2 bg-white shadow p-1">
    @forelse ($comments as $comment)
        @include('comments.partials.comment')
    @empty
        <p class="p-3">{{__('No comments have been made on this goof yet.')}}</p>
    @endforelse
</div>
