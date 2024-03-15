<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EntryHeading extends Component
{
    public $classes;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $headings = []
    )
    {
        $this->classes = 'grid-cols-' . count($headings);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.entry-heading');
    }
}
