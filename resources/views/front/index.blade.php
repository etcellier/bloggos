@extends("welcome")

@section("content")
    <div class="grid grid-cols-3 gap-5">
        <div class="col-span-2">
            @foreach($posts as $post)
                <div class="mb-4 shadow-md bg-white rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h2 class="font-bold text-slate-900 text-2xl">{{ $post->title }}</h2>
                        <div class="my-4">
                            {!! $post->body !!}
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="rounded-full bg-gray-500 h-7 w-7">
                            </div>
                            <span class="flex font-medium text-slate-500">{{ $post->user->name }}</span>
                            <small class="text-slate-400 ms-auto">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="p-4 bg-slate-200">
                        <div class="flex gap-4 items-center">
                            @php
                                $postLikes = DB::select('SELECT * FROM post_like WHERE post_id = ?', [$post->id]);
                                $userLiked = false;

                                foreach ($postLikes as $like) {
                                    if ($like->user_id == Auth::id()) {
                                        $userLiked = true;
                                        break;
                                    }
                                }
                            @endphp
                            <span class="font-bold mr-[-7px]">{{ count($postLikes) }}</span>
                            @if (!$userLiked)
                                <form action="{{ route("app.action.like") }}" method="get">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transition-all stroke-1 hover:stroke-blue-700 hover:cursor-pointer outline-none">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route("app.action.unlike") }}" method="get">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transition-all stroke-1 stroke-blue-700 hover:stroke-black hover:cursor-pointer outline-none">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                            <form action="/" method="post" class="w-full flex items-center gap-2">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                @error('post_id')
                                <div
                                    class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                    {{ $message }}
                                </div>
                                @enderror
                                <input type="text" name="content" placeholder="Ajouter un commentaire..." class="rounded-full bg-white w-full py-1 px-4">
                                @error('content')
                                <div
                                    class="flex bg-yellow-100 dark:bg-yellow-300 text-slate-600 items-start gap-4 rounded-sm shadow-sm mt-2 p-4">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transition-all stroke-1 hover:stroke-green-700">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="flex mt-4 gap-4 flex-col">
                            @foreach($post->comments as $comment)
                                <div class="rounded-md flex flex-col px-4 py-1 w-full">
                                    <div class="flex items-center justify-between">
                                        @php
                                            $user = \App\Models\User::find($comment->user_id);
                                        @endphp
                                        <span class="mr-4 font-bold">{{ $user->name }}</span>
                                        <small class="text-slate-400 ms-auto">{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                    <span class="border-0 border-l-indigo-400 pl-2 rounded-md border-l-2 border-solid">{{ $comment->content }}</span>
                                </div>
                                @if (!$loop->last)
                                    <div class="h-[1px] w-full bg-slate-300"></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="gap-2 col-span-1 mb-4 shadow-md bg-white rounded-lg overflow-hidden p-4 sticky top-5 h-fit">
            <form class="flex gap-2 items-center">
                @csrf
                <input type="text" class="rounded-full bg-slate-100 w-full py-1 px-4" placeholder="Rechercher...">
                <button type="submit" class="p-3 hover:bg-slate-200 rounded-full transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </form>
            <h2 class="font-bold text-slate-600 text-2xl mt-6">Top tags</h2>
            <div class="flex items-center gap-4 mt-3">
                @foreach ($tagCounts as $tagCount)
                    @php
                        $tag = \App\Models\Tag::find($tagCount->tag_id);
                    @endphp
                    <div class="flex items-center  border-solid border-2 px-4 rounded-full hover:cursor-pointer" style="border-color: {{ $tag->color }}">
                        <div class="h-2 w-2 rounded-full mr-2" style="background-color: {{ $tag->color }}"></div>
                        {{ $tag->name }} <span class="text-slate-400 text-sm ml-1">({{ $tagCount->total }})</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 transition-all">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                @endforeach
            </div>
            <h2 class="font-bold text-slate-600 text-2xl mt-6">Top categories</h2>
            <div class="flex items-center gap-4 mt-3">
                @foreach ($categoriesCounts as $categoryCount)
                    @php
                        $category = \App\Models\Category::find($categoryCount->category_id);
                    @endphp
                    <div class="flex items-center border-solid border-2 px-4 rounded-full hover:cursor-pointer" style="border-color: {{ $category->color }}">
                        <div class="h-2 w-2 rounded-full mr-2" style="background-color: {{ $category->color }}"></div>
                        {{ $category->name }} <span class="text-slate-400 text-sm ml-1">({{ $categoryCount->total }})</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 transition-all">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                @endforeach
            </div>
            <h2 class="font-bold text-slate-600 text-2xl mt-6">Top writers</h2>
            <div class="flex items-center gap-4 mt-3">
                @foreach ($writerCounts as $writerCount)
                    @php
                        $writer = \App\Models\User::find($writerCount->user_id);
                    @endphp
                    <div class="flex items-center border-solid border-2 border-slate-500 px-4 rounded-full hover:cursor-pointer">
                        {{ $writer->name }} <span class="text-slate-400 text-sm ml-1">({{ $writerCount->total }})</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 transition-all">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
