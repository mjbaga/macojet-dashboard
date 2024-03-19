<?php

namespace App\Models;

use App\Presenters\Transactable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaseAgreement extends Model
{
    use HasFactory, Transactable;

    protected $fillable = [
        'boarder_id',
        'unit_id',
        'room_id',
        'start_date',
        'end_date',
        'contract_document',
        'includes_city_services',
        'months_deposit',
        'deposit_amount',
        'deposit_refunded',
        'will_renew',
        'active'
    ];

    public function boarder(): BelongsTo
    {
        return $this->belongsTo(Boarder::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function getFormattedStartDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->start_date)->toFormattedDateString();
    }

    public function getFormattedEndDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->end_date)->toFormattedDateString();
    }

    public function getStatusAttribute()
    {    
        return $this->isActive() ? 'Active' : 'Ended';
    }

    public function isActive()
    {
        $now = Carbon::now();

        return ($now >= $this->start_date && $now <= $this->end_date) && $this->active;
    }
}
