<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class LikeComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Post $post
    )
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $postLikes = DB::select('SELECT * FROM post_like WHERE post_id = ?', [$this->post->id]);
        $userLiked = false;

        foreach ($postLikes as $like) {
            if ($like->user_id == Auth::id()) {
                $userLiked = true;
                break;
            }
        }
        return view('components.like-component',
            [
                'postLikes' => $postLikes,
                'userLiked' => $userLiked
            ]
        );
    }
}
