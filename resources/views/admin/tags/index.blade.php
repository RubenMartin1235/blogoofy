<x-app-layout class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="">
            @include('admin.partials.dashboardnavbar')
        </div>
    </div>
    <div class="px-6 py-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <h2 class="text-gray-900 font-bold text-xl flex flex-row">TAGS</h2>
        <table class="bg-white table table-sm border-2 border-gray-200">
            <thead class="border-2 border-gray-200">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Tag name</th>
                    <th class="p-2">Operations</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td><a class="text-gray-900 basis-auto" href="{{ route('tags.show', $tag) }}">{{ $tag->tagname }}</a></td>
                        <td class="flex flex-row justify-evenly">
                            <a class="text-gray-900 basis-auto" href="{{ route('dashboard.admin.tags.edit', $tag) }}">{{__('Edit')}}</a>
                            <a class="text-gray-900 basis-auto" href="{{ route('dashboard.admin.tags.delete', $tag) }}">{{__('Delete')}}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
