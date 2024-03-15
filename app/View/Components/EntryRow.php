<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EntryRow extends Component
{
    public $className;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $columns = 1
    )
    {
        $this->className = 'grid-cols-' . $columns;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.entry-row');
    }
}
