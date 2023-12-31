@extends("welcome")

@section("content")

    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('app.index') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"/>
                        </a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex text-left">
                        <x-nav-link :href="route('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex text-left">
                        <x-nav-link :href="route('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="grid grid-cols-3 gap-5" style="margin-top: 20px">
        <div class="col-span-2">
            @foreach($posts as $post)
                <x-post :$post/>
            @endforeach
        </div>
        <div class="gap-2 col-span-1 mb-4 shadow-md bg-white rounded-lg overflow-hidden p-4 sticky top-5 h-fit">
            <form class="flex gap-2 items-center">
                @csrf
                <input type="text" class="rounded-full bg-slate-100 w-full py-1 px-4" placeholder="Rechercher...">
                <button type="submit" class="p-3 hover:bg-slate-200 rounded-full transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                    </svg>
                </button>
            </form>
            <h2 class="font-bold text-slate-600 text-2xl mt-6">Top tags</h2>
            <div class="flex items-center gap-4 mt-3">
                @foreach ($tagCounts as $tagCount)
                    <x-tagBadge :$tagCount/>
                @endforeach
            </div>
            <h2 class="font-bold text-slate-600 text-2xl mt-6">Top categories</h2>
            <div class="flex items-center gap-4 mt-3">
                @foreach ($categoriesCounts as $categoryCount)
                    <x-categoryBadge :$categoryCount/>
                @endforeach
            </div>
            <h2 class="font-bold text-slate-600 text-2xl mt-6">Top writers</h2>
            <div class="flex items-center gap-4 mt-3">
                @foreach ($writerCounts as $writerCount)
                    <x-writerBadge :$writerCount/>
                @endforeach
            </div>
        </div>
    </div>
@endsection
