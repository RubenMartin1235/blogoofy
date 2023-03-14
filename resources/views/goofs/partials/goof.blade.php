<div class="mb-4 bg-white shadow p-4">
    <div class="flex flex-row gap-x-4">
        <div class="flex flex-col grow">
            <div class="flex flex-row justify-between">
                <a class="text-gray-700 text-xl basis-auto" href="{{ route('goofs.show', $goof) }}">{{$goof->title}}</a>
                <div class="flex flex-row justify-between gap-x-2">
                    @if ($goof->user == Auth::user())
                        <a class="text-gray-400 text-sm basis-auto" href="{{ route('goofs.edit', $goof) }}">{{__('Edit')}}</a>
                        <a class="text-gray-400 text-sm basis-auto" href="{{ route('goofs.show', $goof) }}">{{__('Delete')}}</a>
                    @endif
                    <a class="text-gray-700 text-sm basis-auto" href="{{ route('profile.show', $goof->user) }}">{{$goof->user->name}}</a>
                </div>
            </div>
            <p class="text-gray-500 text-sm mt-2">{{$goof->body}}</p>
        </div>
    </div>

</div>
