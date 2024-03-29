<x-app-layout class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="">
            @include('admin.partials.dashboardnavbar')
        </div>
    </div>
    <div class="px-6 py-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <h2 class="text-gray-900 font-bold text-xl flex flex-row">USERS</h2>
        <table class="bg-white table table-sm border-2 border-gray-200">
            <thead class="border-2 border-gray-200">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Username</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Roles</th>
                    <th class="p-2">Operations</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a class="text-gray-900 basis-auto" href="{{ route('profile.show', $user) }}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{implode(',', $user->roles()->pluck('name')->toArray())}}</td>
                        <td class="flex flex-row justify-evenly">
                            <a class="text-gray-900 basis-auto" href="{{ route('dashboard.admin.users.edit', $user) }}">{{__('Edit')}}</a>
                            <a class="text-gray-900 basis-auto" href="{{ route('dashboard.admin.users.delete', $user) }}">{{__('Delete')}}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
