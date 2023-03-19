<x-app-layout>
    <div class="max-w-4xl mx-auto p-1 sm:p-2 lg:p-3">
        <div class="mt-3 mb-2 bg-white shadow p-1">
            @include('goofs.partials.goof')

            <div class="flex flex-row gap-x-2 gap-y-1 px-4">
                @foreach ($tags as $tag)
                    <a class="bg-black text-sm text-neutral-50 px-1 py-0.5 rounded-md" href="{{ route('tags.show',$tag) }}">
                        {{$tag->tagname}}
                    </a>
                @endforeach
            </div>
            <form method="POST" action="{{ route('tags.attach', ['goof'=>$goof]) }}" class="mt-3">
                @csrf
                @method('PUT')
                <textarea
                    name="tagnames"
                    placeholder="{{ __('Enter tags here') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ $tagnames }}</textarea>
                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                <x-primary-button class="mt-4">{{ __('Add tag') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
