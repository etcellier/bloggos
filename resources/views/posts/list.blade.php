<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-between items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
            <a href="{{ route('posts.add') }}"
               class="rounded-full bg-indigo-400 text-white p-1 shadow-sm hover:shadow hover:bg-indigo-200 hover:text-indigo-400 transition-all dark:bg-indigo-600 dark:hover:bg-indigo-400 dark:hover:text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                @foreach ($posts as $post)
                    <a href="{{ route("posts.update", [$id = $post->id]) }}">
                        <div
                            class="p-6 col-4 text-gray-900 dark:text-gray-100 bg-white rounded hover:shadow transition-all flex flex-col h-full gap-2">
                            <div class="flex justify-between">
                                <div class="flex gap-2">
                                    <span class="font-bold me-3 text-xl">
                                        <span
                                            class="text-slate-400 font-light text-base">{{ $post->category->slug }}/</span>{{ $post->title }}
                                    </span>
                                    @if ($post->published)
                                        <span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Publié</span>
                                    @else
                                        <span
                                            class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Non publié</span>
                                    @endif

                                    @if ($post->draft && $post->published == 0)
                                        <span
                                            class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Brouillon</span>
                                    @endif
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/>
                                </svg>
                            </div>
                            <div class="flex gap-2">
                                <span class="font-bold">Categorie</span> :
                                <span style="color: {{ $post->category->color }}">{{ $post->category->name }}</span>
                            </div>
                            <div class="flex gap-2">
                                @if ($post->allow_comments || $post->allow_likes)
                                    <span class="font-bold">Options</span> :
                                @endif
                                @if ($post->allow_comments)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor"
                                         class="w-6 h-6 stroke-1 stroke-slate-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/>
                                    </svg>
                                @endif

                                @if ($post->allow_likes)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor"
                                         class="w-6 h-6 stroke-1 stroke-slate-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z"/>
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
