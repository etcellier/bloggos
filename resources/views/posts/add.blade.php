<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-between items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new post') }}
        </h2>
    </x-slot>

    <form method="post">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-3 gap-x-4">
                    <div class="col-span-2">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="row">
                                <div class="p-6 col-8 text-gray-900 dark:text-gray-100">
                                    <textarea class="h-screen" name="content" id="articleEditor"></textarea>
                                    @error('content')
                                    <div
                                        class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div
                            class="bg-white sticky top-[85px] dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="row">
                                <div class="p-6 col-4 text-gray-900 dark:text-gray-100">
                                    @csrf
                                    <label class="block">
                                        <span class="block text-sm font-medium text-slate-700">Titre</span>
                                        <input required placeholder="Titre de la publication" name="title" type="text"
                                               class="mt-1 transition-all block w-full px-3 py-2 gb-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                        @error('title')
                                        <div
                                            class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </label>
                                    <label class="block mt-3">
                                        <span class="block text-sm font-medium text-slate-700">Slug</span>
                                        <input required placeholder="Slug de la publication" name="slug" type="text"
                                               class="mt-1 transition-all block w-full px-3 py-2 gb-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                               pattern="[a-z0-9-]+">
                                        @error('slug')
                                        <div
                                            class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </label>
                                    <div class="mt-3">
                                        <label for="category"
                                               class="block text-sm font-medium text-slate-700">Catégorie</label>
                                        <div class="mt-2 w-full">
                                            <select required id="category" name="category" autocomplete="category-name"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                                <option>-- Choisir une catégorie</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category')
                                        <div
                                            class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="tags" class="block text-sm font-medium text-slate-700">Tags</label>
                                        <div class="mt-2 w-full">
                                            <select id="tags" name="tags" autocomplete="tag-name"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                                <option>-- Choisir un tag</option>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('tags')
                                        <div
                                            class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <fieldset class="mt-4 border-b border-gray-900/10 pb-8">
                                        <legend class="text-sm font-semibold leading-6 text-gray-900">Options</legend>
                                        <div class="mt-1 space-y-2">
                                            <div class="flex items-center gap-x-3">
                                                <input id="comments" name="comments" type="checkbox"
                                                       class="h-4 w-4 border-gray-300 text-indigo-500 focus:ring-indigo-500">
                                                <label for="comments" class="block text-sm font-medium text-slate-700">Autoriser
                                                    les commentaires</label>
                                            </div>
                                            @error('comments')
                                            <div
                                                class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <div class="flex items-center gap-x-3">
                                                <input id="likes" name="likes" type="checkbox"
                                                       class="h-4 w-4 border-gray-300 text-indigo-500 focus:ring-indigo-500">
                                                <label for="likes" class="block text-sm font-medium text-slate-700">Autoriser
                                                    les likes</label>
                                            </div>
                                            @error('likes')
                                            <div
                                                class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </fieldset>
                                    <div class="mt-6 flex items-center justify-end gap-x-6">
                                        <a href="{{ route("posts.list") }}" type="button"
                                           class="text-sm font-semibold leading-6 text-gray-900">Annuler</a>
                                        <button type="submit"
                                                class="rounded-md transition-all bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                            Publier
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#articleEditor',
                menubar: "edit view insert format",
                menu: {
                    edit: {title: 'Edit', items: 'undo, redo, selectall'}
                },
                plugins: [
                    'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                    'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
                    'media', 'table', 'emoticons', 'template', 'help'
                ],
                toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
            });
        });
    </script>

</x-app-layout>
