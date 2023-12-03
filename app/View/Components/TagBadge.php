<?php

namespace App\View\Components;

use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagBadge extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $tagCount
    )
    {
        $this->tagCount = $tagCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tag = Tag::find($this->tagCount->tag_id);
        return view('components.tag-badge', [
            'tag' => $tag
        ]);
    }
}
