<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('categories') }}" class="align-middle bg-blue-500 ml-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Back</a>
        <a href="{{ route('categories.edit', $category->id) }}" class="align-middle bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Edit</a>
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Category Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-lg font-medium text-gray-700">Category Name</label>
                <p class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $category->name }}</p>
            </div>

            <div>
                <label class="block text-lg font-medium text-gray-700">Description</label>
                <p class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $category->description }}</p>
            </div>

            <div>
                <label class="block text-lg font-medium text-gray-700">Category Image</label>

                @if($category->image)
                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-22 h-22 object-cover">
                @else
                No image available
                @endif

            </div>
        </div>
    </div>
</x-app-layout>