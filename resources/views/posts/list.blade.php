<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-between items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
            <a href="{{ route('posts.add') }}" class="rounded-full bg-indigo-400 text-white p-1 shadow-sm hover:shadow hover:bg-indigo-200 hover:text-indigo-400 transition-all dark:bg-indigo-600 dark:hover:bg-indigo-400 dark:hover:text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="p-6 col-4 text-gray-900 dark:text-gray-100">
                        {{ __("Post title") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
