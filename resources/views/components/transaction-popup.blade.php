<x-modal-popup id="transaction-form" :title="'New Transaction'">
    @if ($errors)
        <ul>
            @foreach ($errors as $error)
                <li>$error</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="transactable_id" value="{{ $transactableId }}">
        <input type="hidden" name="transactable_type" value="{{ $transactableType }}">
        <div class="grid gap-4">

            <!-- Transaction Type -->
            <div class="mb-4">
                <x-input-label for="transaction_type" :value="__('Transaction Type')" />
                <x-select name="transaction_type">
                    @foreach (\App\Models\Transaction::$transactionType as $index => $purpose)
                        <option value="{{ $index }}" @selected(old('transaction_type') === $index)>
                            {{ Str::ucfirst($purpose) }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('transaction_type')" class="mt-2" />
            </div>

            <!-- Payment Method -->
            <div class="mb-4">
                <x-input-label for="payment_method" :value="__('Payment Method')" />
                <x-select name="payment_method">
                    @foreach (\App\Models\Transaction::$paymentMethods as $index => $method)
                        <option value="{{ $index }}" @selected(old('payment_method') === $index)>
                            {{ Str::ucfirst($method) }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
            </div>

            <!-- Amount -->
            <div>
                <x-input-label for="amount" :value="'Amount'" />
                <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount') ?? 0"
                    required />
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <!-- Date of Payment -->
            @php
                $now = \Carbon\Carbon::now()->format('Y-m-d');
            @endphp
            <div>
                <x-input-label for="date_of_payment" :value="'Date of Payment'" />
                <input type="date" name="date_of_payment" id="date_of_payment" class="input-text"
                    value="{{ old('date_of_payment') ?? $now }}">
                <x-input-error :messages="$errors->get('date_of_payment')" class="mt-2" />
            </div>

            <!-- Proof of Payment -->
            <div class="mb-4">
                <x-input-label for="payment_proof" :value="__('Proof of Payment')" />
                <input class="mt-1" type="file" id="payment_proof" name="payment_proof"
                    accept="image/png, image/jpeg, image/jpg" />
                <x-input-error :messages="$errors->get('payment_proof')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</x-modal-popup>
