<?php


namespace App\Services;

use App\Models\Boarder;
use App\Models\Transaction;
use App\Http\Requests\TransactionRequest;
use App\Interfaces\TransactionRepository;

class BoarderTransactionService implements TransactionRepository
{

    public function save(TransactionRequest $request): void
    {
        $boarder = Boarder::findOrFail($request->transactable_id);

        $validatedData = $request->validated();

        if($request->file('payment_proof')) {
            $file = $request->file('payment_proof');
            $path = $file->store($validatedData['transaction_type'], 'private');

            $validatedData['proof_of_payment'] = $path;
        }

        $boarder->transactions()->create($validatedData);
    }

    public function update(Transaction $transaction, TransactionRequest $request): void
    {
        $validatedData = $request->validated();

        if($request->file('proof')) {
            $file = $request->file('proof');
            $path = $file->store($validatedData['type'], 'private');

            $validatedData['proof_of_payment'] = $path;
        }

        $transaction->update($validatedData);
    }

}