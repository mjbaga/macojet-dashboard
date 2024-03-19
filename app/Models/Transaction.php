<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    public function transactable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'transactable_type', 'transactable_id');
    }
}
