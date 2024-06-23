<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('categories.create') }}" class="align-middle bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Add Category</a>
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium">@sortablelink('id', 'ID') <span class="inline-block ml-1">⬍</span></th>
                    <th class="px-6 py-3 text-left text-sm font-medium">@sortablelink('name', 'Name') <span class="inline-block ml-1">⬍</span></th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Description</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Image</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Edit</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Delete</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">View</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @if($categories->count())
                @foreach($categories as $category)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-16 h-16 object-cover">
                        @else
                        No image available
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700">✏️</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                🗑️
                            </button>
                        </form>
                    </td>
                    <td><a href="{{ route('categories.show', $category->id) }}">👁️</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" colspan="6">No categories found</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-4">
            {!! $categories->appends(request()->except('page'))->links() !!}
        </div>
    </div>
</x-app-layout>