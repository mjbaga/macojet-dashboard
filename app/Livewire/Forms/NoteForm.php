<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Note;
use Livewire\Attributes\Validate;

class NoteForm extends Form
{
    public ?Note $note = null;

    public int $id;

    #[Validate('required|string')]
    public string $type;

    #[Validate('date|nullable')]
    public string $reminder_alarm;

    #[Validate('required|string|min:5')]
    public string $content;

    public int $noteable_id;

    public string $noteable_type;


    public function save(): void
    {
        $this->validate();

        if(!$this->note) {
            Note::create($this->all());
        } else {
            $this->note->update($this->all());
        }
    }

    public function setNote(?Note $note = null): void
    {
        $this->note = $note;
        $this->id = $note->id;
        $this->type = $note->type;
        $this->content = $note->content;
        $this->reminder_alarm = $note->reminder_alarm;
        $this->noteable_id = $note->noteable_id;
        $this->noteable_type = $note->noteable_type;
    }
}
