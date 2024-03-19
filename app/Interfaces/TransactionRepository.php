<?php

namespace App\Interfaces;

use App\Models\Transaction;
use App\Http\Requests\TransactionRequest;

interface TransactionRepository {
    public function save(TransactionRequest $transaction): void;

    public function update(Transaction $transaction, TransactionRequest $request): void;
    
}