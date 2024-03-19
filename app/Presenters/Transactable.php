<?php

namespace App\Presenters;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Transactable {
    public function transactions(): MorphMany
    {
        return $this->morphMany(Transaction::class, 'transactable');
    }
}