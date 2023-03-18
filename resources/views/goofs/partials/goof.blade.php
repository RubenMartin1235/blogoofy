<div class="mb-4 bg-white shadow p-4">
    <div class="flex flex-row gap-x-4">
        <div class="flex flex-col grow basis-full">
            <div class="flex flex-row justify-between">
                <a class="text-gray-800 text-xl basis-auto" href="{{ route('goofs.show', $goof) }}">{{$goof->title}}</a>
                <div class="flex flex-row justify-between gap-x-2">
                    @if ($goof->user == Auth::user())
                        <a class="text-gray-400 text-sm basis-auto" href="{{ route('goofs.edit', $goof) }}">{{__('Edit')}}</a>
                        <a class="text-gray-400 text-sm basis-auto" href="{{ route('goofs.delete', $goof) }}">{{__('Delete')}}</a>
                    @endif
                    <a class="text-gray-700 text-sm basis-auto" href="{{ route('profile.show', $goof->user) }}">{{$goof->user->name}}</a>
                </div>
            </div>
            <p class="text-gray-600 text-sm mt-2">{!! nl2br(e($goof->body)) !!}</p>
            <div class="flex flex-row justify-between mt-2">
                <div class="flex flex-col text-gray-600 text-xs justify-center">
                    @if (count($goof->ratings) > 0)
                        <div class="flex flex-row items-center gap-x-1 text-sm">
                            <p>{{round($goof->ratings->avg('rating'), 2)}}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    @else
                        <p>{{__('Unrated')}}</p>
                    @endif
                </div>
                <div class="self-end text-right">
                    <p class="text-gray-400 text-xs">
                        {{ __('Created: ') . Carbon::parse($goof->created_at)->format('Y-m-d H:i') }}
                    </p>
                    @unless ($goof->created_at == $goof->updated_at)
                        <p class="text-gray-400 text-xs">
                            {{ __('Last updated: ') . Carbon::parse($goof->updated_at)->format('Y-m-d H:i') }}
                        </p>
                    @endunless
                </div>
            </div>
        </div>

    </div>

</div>
