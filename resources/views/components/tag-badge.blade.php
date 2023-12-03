<div class="flex items-center  border-solid border-2 px-4 rounded-full hover:cursor-pointer" style="border-color: {{ $tag->color }}">
    <div class="h-2 w-2 rounded-full mr-2" style="background-color: {{ $tag->color }}"></div>
    {{ $tag->name }} <span class="text-slate-400 text-sm ml-1">({{ $tagCount->total }})</span>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 transition-all">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
    </svg>
</div>
