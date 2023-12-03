<div class="rounded-md flex flex-col px-4 py-1 w-full">
    <div class="flex items-center justify-between">
        <span class="mr-4 font-bold">{{ $user->name }}</span>
        <small class="text-slate-400 ms-auto">{{ $comment->created_at->diffForHumans() }}</small>
    </div>
    <span class="border-0 border-l-indigo-400 pl-2 rounded-md border-l-2 border-solid">{{ $comment->content }}</span>
</div>
