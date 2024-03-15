<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class WorkerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'company_address',
        'position',
        'schedule_type'
    ];

    public static array $scheduleType = ['Regular 9 - 5 weekdays', 'Irregular'];

    public function boarder(): MorphOne
    {
        return $this->morphOne(\App\Models\Boarder::class, 'profileable');
    }

    
}
