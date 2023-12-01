<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-between items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags') }}
            <a href="{{ route('tag.add') }}" class="rounded-full bg-indigo-400 text-white p-1 shadow-sm hover:shadow hover:bg-indigo-200 hover:text-indigo-400 transition-all dark:bg-indigo-600 dark:hover:bg-indigo-400 dark:hover:text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                @foreach ($tags as $tag)
                    <a href="{{ route("tag.update", [$id = $tag->id]) }}">
                        <div class="p-6 col-4 text-gray-900 dark:text-gray-100 bg-white rounded hover:shadow transition-all flex justify-between h-full gap-2">
                            <div class="flex justify-start gap-2 items-center">
                                <div class="w-2 h-2 rounded-full" style="background-color: {{ $tag->color }}"></div>
                                {{ $tag->name }}
                                <span class="text-slate-400 font-light text-base">(/{{ $tag->slug }})</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-auto">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
