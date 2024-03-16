@section('page_title', 'Units')
<x-app-layout>
    <x-page-heading :title="'Units'" :actions="[['href' => 'units.create', 'title' => 'Create New Unit']]" />

    <x-content-wrap class="max-w-7xl mt-12">
        <x-entry-heading :headings="['Unit Name', 'Unit Type', 'Last Updated', 'Actions']" />
        @forelse ($units as $unit)
            <x-entry-row :columns="4">
                <div>
                    {{ $unit->unit_name }}
                </div>
                <div>{{ Str::ucfirst($unit->unit_type) }}</div>
                <div>{{ $unit->updated_at->diffForHumans() }}</div>
                <div class="flex gap-2 justify-end">
                    <x-link-button :href="route('units.edit', $unit)">Edit</x-link-button>
                    <form action="{{ route('units.destroy', $unit) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger index-delete-btn" data-bs-toggle="modal"
                            data-bs-target="#delete-modal">
                            Delete
                        </button>
                    </form>
                </div>
            </x-entry-row>
        @empty
            <div class="py-12 text-center font-bold">
                <p>No units yet.</p>
            </div>
        @endforelse

        @if ($units)
            <x-modal-confirm id="delete-modal" :title="'Confirm'">
                Are you sure you want to delete this unit?
            </x-modal-confirm>
        @endif
    </x-content-wrap>
</x-app-layout>
