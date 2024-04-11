<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'transaction_type',
        'payment_method',
        'date_of_payment',
        'transactable_type',
        'transactable_id',
        'proof_of_payment'
    ];

    public static array $paymentMethods = [
        'cash' => 'Cash',
        'bank' => 'Bank Transfer',
        'gcash' => 'Gcash',
    ];

    public static array $transactionType = [
        'rent' => 'Rent',
        'transient' => 'Transient',
        'deposit' => 'Deposit',
        'public_utility' => 'Public Utility',
        'drinking_water' => 'Drinking Water',
        'other' => 'Other',
    ];

    public function transactable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'transactable_type', 'transactable_id');
    }

    public function getFormattedDateOfPaymentAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date_of_payment)->toFormattedDateString();
    }
}
