@section('page_title', 'Transients')
<x-app-layout>
    <x-page-heading :title="'Transients'" :actions="[['href' => route('transients.create'), 'title' => 'Add New Transient']]" />

    <x-content-wrap class="max-w-7xl">
        <x-entry-heading :headings="['Name', 'Contact', 'Check In', 'Check Out', 'Actions']" />
        @forelse ($transients as $transient)
            <x-entry-row :columns="5">
                <div>
                    <a href="{{ route('transients.show', $transient) }}" class="text-slate-500">
                        {{ $transient->fullName }}
                    </a>
                </div>
                <div>{{ $transient->contact_number }}</div>
                <div>{{ $transient->check_in }}</div>
                <div>{{ $transient->check_out }}</div>
                <div class="flex gap-2 justify-end">
                    <x-link-button :href="route('transients.edit', $transient->id)">Edit</x-link-button>
                    <form action="{{ route('transients.destroy', $transient) }}" method="POST">
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
            <p>No transients yet.</p>
        @endforelse

        <div class="my-4">
            {{ $transients->links() }}
        </div>

    </x-content-wrap>
</x-app-layout>
