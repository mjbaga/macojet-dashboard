<?php

namespace App\Presenters;

use App\Models\Note;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Noteable {
    public function notes(): MorphMany
    {
        return $this->morphMany(Note::class, 'noteable');
    }
}