@section('page_title', 'Transactions')
<x-app-layout>
    <x-page-heading :title="'Transactions'" />

    <x-content-wrap class="max-w-7xl py-0">
        <x-entry-heading :headings="['Type', 'Made by', 'Amount', 'Payment Method', 'Date of Payment', 'Actions']" />
        @forelse ($transactions as $transaction)
            <x-entry-row :columns="6">
                <div>{{ Str::ucfirst($transaction->transaction_type) }}</div>
                <div>{{ $transaction->transactable->fullName }}</div>
                <div>₱ {{ number_format($transaction->amount, 2) }}</div>
                <div>{{ Str::ucfirst($transaction->payment_method) }}</div>
                <div>{{ $transaction->formatted_date_of_payment }}</div>
                <div class="flex gap-2 justify-end">
                    <x-link-button :href="route('transactions.edit', $transaction->id)" class="btn-sm">
                        <i class="bi bi-pencil-square"></i>
                        <span class="vh">Edit</span>
                    </x-link-button>
                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger index-delete-btn" data-bs-toggle="modal"
                            data-bs-target="#delete-modal">
                            <i class="bi bi-trash3-fill"></i>
                            <span class="vh">Delete</span>
                        </button>
                    </form>
                </div>
            </x-entry-row>
        @empty
            <div class="grid py-8 place-items-center">
                <p>No transactions yet.</p>
            </div>
        @endforelse

    </x-content-wrap>
</x-app-layout>
