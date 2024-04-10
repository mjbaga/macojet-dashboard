<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;

class NotesList extends Component
{
    public $notes;
    public $model;

    public function mount($model)
    {
        $this->model = $model;
        $this->notes = $model->notes()->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.notes-list');
    }

    public function toggleResolved(Note $note): void
    {
        $note->update(['resolved' => !$note->resolved]);
        $this->notes = $this->model->notes()->orderBy('created_at', 'desc')->get();
    }
}

