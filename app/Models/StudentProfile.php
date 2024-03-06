<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_type',
        'vaccine',
        'home_on_weekends'
    ];

    public static array $schedule = ['online', 'blended', 'face to face'];

    public static array $vaccine = ['unvaccinated', 'first', 'second', 'booster'];

    public function boarder(): MorphOne
    {
        return $this->morphOne(\App\Models\Boarder::class, 'profileable');
    }
}
