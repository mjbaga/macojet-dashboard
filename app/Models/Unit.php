<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unit_name',
        'unit_type'
    ];

    public static array $type = ['boarding', 'transient', 'both'];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function getTotalCapacityAttribute()
    {
        $capacity = 0;

        foreach($this->rooms as $room) {
            $capacity += $room->capacity;
        }

        return $capacity;
    }
}
