<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PopupNotesForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $noteableId,
        public string $noteableType
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popup-notes-form');
    }
}
