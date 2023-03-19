<x-app-layout>
    <div class="max-w-4xl mx-auto p-1 sm:p-2 lg:p-3">
        <div class="mt-3 mb-2 bg-white shadow p-1">
            <div class="flex flex-row gap-x-2 gap-y-1 px-4">
                @foreach ($tags as $tag)
                    <a class="bg-black text-xl text-neutral-50 text-extrabold px-1 py-0.5 rounded-md" href="{{ route('tags.show',$tag) }}">
                        {{$tag->tagname}}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
