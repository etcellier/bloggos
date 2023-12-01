<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-between items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new tag') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('tag.add') }}">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-x-4">
                    <div>
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="row">
                                <div class="p-6 col-12 text-gray-900 dark:text-gray-100">
                                    @csrf
                                    <label class="block">
                                        <span class="block text-sm font-medium text-slate-700">Titre</span>
                                        <input required placeholder="Titre du tag" name="name" type="text"
                                               class="mt-1 transition-all block w-full px-3 py-2 gb-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                        @error('name')
                                        <div
                                            class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </label>
                                    <label class="block mt-3">
                                        <span class="block text-sm font-medium text-slate-700">Slug</span>
                                        <input required placeholder="Slug du tag" name="slug" type="text"
                                               class="mt-1 transition-all block w-full px-3 py-2 gb-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                               pattern="[a-z0-9-]+">
                                        @error('slug')
                                        <div
                                            class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </label>
                                    <label class="block mt-3">
                                        <span class="block text-sm font-medium text-slate-700">Color</span>
                                        <input type="text" name="color" data-coloris>
                                        @error('color')
                                        <div
                                            class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </label>
                                    <div class="mt-6 flex items-center justify-end gap-x-6">
                                        <a href="{{ route("tag.list") }}" type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</a>
                                        <button type="submit" class="rounded-md transition-all bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Publier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.js"></script>
</x-app-layout>
