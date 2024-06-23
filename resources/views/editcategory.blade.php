<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('categories') }}" class="align-middle bg-blue-500 ml-3 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Back</a>
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-lg font-medium text-gray-700">Category Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('name', $category->name) }}">
                    @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-lg font-medium text-gray-700">Category Image</label>
                    @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @else
                    <p class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">No image available</p>
                    @endif
                    <input type="file" name="image" id="image" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>