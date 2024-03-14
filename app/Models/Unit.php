<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
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

    public function scopeBoardingType(Builder $query, string $type): Builder
    {
        return $query->where('unit_type', '=', $type);
    }

    public function getRooms(string $id)
    {
        $unit = Unit::findOrFail($id);

        return $unit->rooms;
    }
}
