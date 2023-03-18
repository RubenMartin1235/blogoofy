<x-app-layout>
    <div class="max-w-4xl mx-auto p-1 sm:p-2 lg:p-3">
        <div class="mt-3 mb-2 bg-white shadow p-1">
            @include('goofs.partials.goof')

            @unless (Auth::user() == $goof->user)
                <div class="flex flex-row mt-2 p-4 gap-x-4">
                    <p class="text-gray-600 text-md">{{__('Give your rating here:')}}</p>
                    <form method="POST" action="{{ route('ratings.store', $goof) }}">
                        @csrf
                        <div class="flex flex-row">
                            @for ($i=0; $i<5; $i++)
                                <button name="rating" value={{$i+1}}>
                                    @if ($i < (($user_rating->rating) ?? 0))
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                        </svg>
                                    @endif

                                </button>
                            @endfor
                        </div>
                    </form>
                </div>
            @endunless

            @include('comments.partials.commentlist')
            <form method="POST" action="{{ route('comments.store', $goof) }}">
                @csrf
                <textarea
                    name="body"
                    placeholder="{{ __('Enter a comment here') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                <x-primary-button class="mt-4">{{ __('Comment') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
