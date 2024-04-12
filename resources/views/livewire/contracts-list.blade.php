<div class="flex items-start max-w-7xl mx-auto gap-4">
    <x-content-wrap class="flex-1 w-3xl py-0 mt-8 mx-0">
        <div class="flex justify-between items-center">
            <h2 class="h2 py-2 my-0">Contracts</h2>
            <button class="btn btn-dark"
                wire:click.prevent="$dispatch('openModal', { component: 'contracts-modal', arguments: { boarder: {{ $boarder->id }} } })">
                New Contract
            </button>
        </div>
        <div class="mt-4">
            <x-entry-heading :headings="['Unit', 'Room', 'Start', 'End', 'Status', 'Terms', 'Recurring Payment', 'Actions']" />
            @forelse ($contracts as $contract)
                <x-entry-row :columns="8">
                    <div>{{ $contract->unit->unit_name }}</div>
                    <div>{{ $contract->room->room_number }}</div>
                    <div>{{ $contract->formatted_start_date }}</div>
                    <div>{{ $contract->formatted_end_date }}</div>
                    <div>{{ $contract->status }}</div>
                    <div>{{ Str::ucfirst($contract->terms_of_payment) }}</div>
                    <div>{{ $contract->formatted_agreed_payment }}</div>
                    <div class="justify-self-end">
                        <button class="btn btn-sm btn-dark"
                            wire:click="$dispatch('openModal', { component: 'contracts-modal', arguments: { contract: {{ $contract->id }} }})">
                            <i class="bi bi-pencil-square"></i>
                            <span class="vh">Edit</span>
                        </button>
                    </div>
                </x-entry-row>
            @empty
                <div class="grid py-8 place-items-center">
                    <p>No contracts yet.</p>
                </div>
            @endforelse

        </div>
    </x-content-wrap>
</div>
