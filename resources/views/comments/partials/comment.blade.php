<div class="mb-4 bg-white shadow p-4">
    <div class="flex flex-row gap-x-4">
        <div class="flex flex-col grow">
            <div class="flex flex-row justify-between">
                <a class="text-gray-700 text-sm basis-auto" href="{{ route('profile.show', $comment->user) }}">{{$comment->user->name}}</a>
                <div class="flex flex-row justify-between gap-x-2">
                    @if ($comment->user == Auth::user())
                        <a class="text-gray-400 text-sm basis-auto" href="{{ route('comments.edit', $comment) }}">{{__('Edit')}}</a>
                        <a class="text-gray-400 text-sm basis-auto" href="{{ route('comments.delete', $comment) }}">{{__('Delete')}}</a>
                    @endif
                </div>
            </div>
            <p class="text-gray-600 text-sm mt-2">{{$comment->body}}</p>
            <div class="self-end text-right mt-2">
                <p class="text-gray-400 text-xs">
                    {{ __('Created: ') . Carbon::parse($comment->created_at)->format('Y-m-d H:i') }}
                </p>
                @unless ($comment->created_at == $comment->updated_at)
                    <p class="text-gray-400 text-xs">
                        {{ __('Last updated: ') . Carbon::parse($comment->updated_at)->format('Y-m-d H:i') }}
                    </p>
                @endunless
            </div>
        </div>
    </div>

</div>
