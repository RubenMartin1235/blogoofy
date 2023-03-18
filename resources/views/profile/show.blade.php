<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex flex-row gap-x-6">
                    <div class="grow basis-7/12">
                        <header class="mb-6">
                            <h2 class="text-lg font-medium text-gray-900 text-center">
                                {{ __('Profile Information') }}
                            </h2>
                        </header>
                        <div class="mb-3">
                            <x-input-label for="name" :value="__('Name:')" />
                            <x-input-label id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email:')" />
                            <x-input-label id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                    </div>
                    <div class="grow basis-5/12">
                        <header class="mb-6">
                            <h2 class="text-lg font-medium text-center text-gray-900">
                                {{ __('Profile Stats') }}
                            </h2>
                        </header>

                        <div class="flex flex-row flex-wrap justify-center gap-4">
                            <div class="flex flex-col justify-start items-center border-2 border-gray-200 p-2">
                                <x-input-label for="goofcount" :value="__('Number of goofs:')" />
                                <p id="goofcount" name="goofcount" class="text-3xl">{{$user->goofs()->count()}}</p>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="flex flex-col justify-start items-center border-2 border-gray-200 p-2">
                                <x-input-label for="userrating" :value="__('Average post rating:')" />
                                <div class="flex flex-row justify-center items-center gap-x-2">
                                    <p id="userrating_received_avg" name="userrating_received_avg" class="text-3xl">
                                        {{round($userrating_received_avg,2)}}
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p id="userrating_received_count" name="userrating_received_count" class="text-sm text-gray-600">
                                    {{$userrating_received_count . __(' ratings received')}}
                                 </p>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            -->
            @include('goofs.partials.gooflist')
        </div>
    </div>
</x-app-layout>
