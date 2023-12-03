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
            <x-likeComponent :$post />
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
                <x-commentComponent :$comment />
                @if (!$loop->last)
                    <div class="h-[1px] w-full bg-slate-300"></div>
                @endif
            @endforeach
        </div>
    </div>
</div>
