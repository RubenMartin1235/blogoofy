<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('dashboard.admin.tags.update', $tag->id) }}">
            @csrf
            @method('PUT')
            <x-input-label for="ownerid" :value="__('Tag name:')" />
            <input
                name="tagname"
                type="text"
                placeholder="{{ __('Enter this tag\'s name here') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-4 text-lg"
                value="{{ $tag->tagname }}"
            >
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4">
                <x-primary-button class="">{{ __('Apply changes') }}</x-primary-button>
                <a class="btn btn-default p-2" href="{{url()->previous()}}">{{ __('Cancel changes') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
