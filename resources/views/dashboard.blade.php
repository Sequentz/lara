<!-- example.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden text-white shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl mb-4">Welcome back, {{ Auth::user()->name }}!</h1>

                <div class="bg-gray-900 text-white p-4 rounded-lg mb-6">
                    <h2 class="text-xl mb-2">Here's a joke to make your day! </h2>
                    <p class="text-lg">{{ $joke }}</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>