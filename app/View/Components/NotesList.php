<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NotesList extends Component
{
    public $notes;
    public $noteableId;
    public $model;
    public $noteableType;

    /**
     * Create a new component instance.
     */
    public function __construct($model)
    {
        $this->model = $model;
        $this->notes = $model->notes;
        $this->noteableId = $model->id;
        $this->noteableType = get_class($model);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notes-list');
    }
}
