<?php

namespace App\View\Components;

use App\Models\Comment;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Comment $comment
    )
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = User::find($this->comment->user_id);
        return view('components.comment-component', [
            'user' => $user
        ]);
    }
}
