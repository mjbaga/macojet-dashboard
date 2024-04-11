<?php

namespace App\Models;

use App\Presenters\Noteable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Presenters\Transactable;
use App\Presenters\Personable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use \Carbon\Carbon;

class Transient extends Model
{
    use HasFactory, SoftDeletes, Personable, Transactable, Noteable;

    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',
        'fb_account_name',
        'date_of_birth',
        'origin_address',
        'gender',
        'id_card'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeActiveBooking(Builder $query): Builder
    {
        $now = Carbon::now('Y-m-d');

        return $query->bookings()->where('check_in', '>=', $now)->where('check_out', '<=', $now);
    }

    public function scopeLatestBooking(Builder $query): Builder
    {
        return $query->bookings()->orderBy('check_in', 'desc')->first();
    }

    public function getLatestBookingAttribute(): Booking|null
    {
        return $this->bookings()->orderBy('check_in', 'desc')->first();
    }

    public function getStatusAttribute(): string
    {
        if($this->bookings()->count() === 0) {
            return 'No bookings yet';
        }

        $now = Carbon::now();
        $latestBooking = $this->latestBooking;

        if ($latestBooking->check_in <= $now && $latestBooking->check_out >= $now) {
            return 'Active';
        } else if ($latestBooking->check_in > $now) {
            return 'Upcoming booking';
        } else if ($latestBooking->check_out < $now) {
            return 'Bookings finished';
        }

        return 'No current booking';
    }
}
