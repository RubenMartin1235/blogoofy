<div class="p-6 text-gray-900 flex flex-row">
    <div class="space-x-8 sm:-my-px flex">
        <x-nav-link :href="route('dashboard.admin.users')" :active="request()->routeIs('dashboard')" class="p-1">
            {{ __('Users') }}
        </x-nav-link>
    </div>
    <div class="space-x-8 sm:-my-px flex">
        <x-nav-link :href="route('dashboard.admin.goofs')" :active="request()->routeIs('dashboard')" class="p-1">
            {{ __('Goofs') }}
        </x-nav-link>
    </div>
    <div class="space-x-8 sm:-my-px flex">
        <x-nav-link :href="route('dashboard.admin.tags')" :active="request()->routeIs('dashboard')" class="p-1">
            {{ __('Tags') }}
        </x-nav-link>
    </div>
</div>
