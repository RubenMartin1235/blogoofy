<div class="mb-4 bg-gray shadow p-4">
    <div class="flex flex-row gap-x-4">
        <div class="flex flex-col">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
            </svg>
        </div>
        <div class="flex flex-col grow">
            <div class="flex flex-row justify-between">
                <div class="flex flex-row justify-start gap-x-4">
                    <a class="text-gray-800 text-sm basis-auto" href="{{ route('profile.show', $comment->user) }}">{{$comment->user->name}}</a>
                    <div class="self-center">
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
                <div class="flex flex-row justify-between gap-x-2">
                    @if ($comment->user == Auth::user())
                        <a class="text-gray-400 text-sm basis-auto" href="{{ route('comments.edit', $comment) }}">{{__('Edit')}}</a>
                        <a class="text-gray-400 text-sm basis-auto" href="{{ route('comments.delete', $comment) }}">{{__('Delete')}}</a>
                    @endif
                </div>
            </div>
            <p class="text-gray-600 text-sm mt-2">{{$comment->body}}</p>
        </div>
    </div>

</div>
