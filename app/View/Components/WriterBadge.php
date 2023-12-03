<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WriterBadge extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $writerCount
    )
    {
        $this->writerCount = $writerCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $writer = User::find($this->writerCount->user_id);
        return view('components.writer-badge', ['writer' => $writer]);
    }
}
