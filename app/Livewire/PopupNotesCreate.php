<?php

namespace App\Livewire;

use App\Services\Utils;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Livewire\Forms\NoteForm;

class PopupNotesCreate extends Component
{
    public NoteForm $form;

    public $noteableId;
    public $noteableType;
    public $model;

    public function mount($noteableId, $noteableType, $model)
    {
        $this->form->noteable_id = $noteableId;
        $this->form->noteable_type = $noteableType;
        $this->model = $model;
    }

    public function addNote()
    {
        $this->validate();
        $this->form->store();
        $modelClass = Str::plural(strtolower(Utils::getClassName($this->model)));
        return redirect()->route($modelClass . '.show', $this->model)->with('success', 'Added new note.');
    }

    public function render()
    {
        return view('livewire.popup-notes-create');
    }
}
