<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Note;
use Livewire\Attributes\Validate;

class NoteForm extends Form
{
    #[Validate('required|string')]
    public string $type;

    #[Validate('date|nullable')]
    public string $reminder_alarm;

    #[Validate('required|string|min:5')]
    public string $content;

    public int $noteable_id;

    public string $noteable_type;


    public function store(): void
    {
        $this->validate();

        Note::create($this->all());
    }
}
