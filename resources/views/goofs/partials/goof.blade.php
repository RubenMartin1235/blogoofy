<div class="mt-4 mb-4 bg-white shadow p-3">
    <div class="">
        <div class="flex flex-row justify-between">
            <a class="text-gray-700 text-xl basis-auto" href="{{ route('goofs.show', $goof) }}">{{$goof->title}}</a>
            <a class="text-gray-600 text-sm basis-auto" href="{{ route('profile.show', $goof->user) }}">{{$goof->user->name}}</a>
        </div>
        <p class="text-gray-500 text-sm mt-2">{{$goof->body}}</p>

    </div>
</div>
