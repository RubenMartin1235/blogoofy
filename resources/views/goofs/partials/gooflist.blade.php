<div class="mt-3 mb-2 bg-white shadow p-1">
    @isset($user)
    <h2 class="text-lg font-medium text-gray-900 p-4">
        {{$user->name}}{{ __('\'s goofs') }}
    </h2>
    @endisset
    @foreach ($goofs as $goof)
        @include('goofs.partials.goof')
    @endforeach
</div>
