<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class RevieweeProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_center',
        'review_center_address'
    ];

    public function boarder(): MorphOne
    {
        return $this->morphOne(\App\Models\Boarder::class, 'profileable');
    }
}
