<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LeaseAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'boarder_id',
        'unit_id',
        'room_id',
        'start_date',
        'end_date',
        'contract_document',
        'includes_city_services',
        'months_deposit',
        'deposit_refunded',
        'will_renew'
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
}
