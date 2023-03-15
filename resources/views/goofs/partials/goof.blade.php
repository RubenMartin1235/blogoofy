<div class="mb-4 bg-white shadow p-4">
    <div class="flex flex-row gap-x-4">
        <div class="flex flex-col grow">
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
            <p class="text-gray-600 text-sm mt-2">{{$goof->body}}</p>
            <div class="self-end text-right mt-2">
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
