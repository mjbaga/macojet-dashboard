<?php

namespace App\Livewire;

use App\Models\Note;
use Illuminate\Support\Str;
use App\Livewire\Forms\NoteForm;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class NotesModal extends ModalComponent
{
    public NoteForm $form;

    public ?Note $note = null;
    public $noteableId = null;
    public $noteableType = null;
    public string $heading = '';

    public function mount(Note $note = null): void
    {
        if($note && $note->exists) {
            $this->form->setNote($note);
            $this->noteableId = $note->noteable_id;
            $this->noteableType = Str::singular(Str::afterLast($note->noteable_type, '\\'));
            $this->heading = 'Edit';
        } else {
            $this->form->noteable_id = $this->noteableId;
            $this->form->noteable_type = "App\\Models\\" . $this->noteableType;
            $this->heading = 'Add';
        }
        
    }

    public function addNote()
    {
        $this->validate();
        $this->form->save();
        $modelClass = Str::plural(strtolower($this->noteableType));
        return redirect()->route($modelClass . '.show', $this->noteableId)->with('success', "Successfully {$this->heading}ed note.");
    }

    public function render(): View
    {
        return view('livewire.notes-form');
    }
}
