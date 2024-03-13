@section('page_title', 'Units')
<x-app-layout>
    <x-page-heading :title="'Units'" :actions="[['href' => 'units.create', 'title' => 'Create New Unit']]" />

    <x-content-wrap class="max-w-7xl mt-12">
        <x-heading-entry :headings="['Unit Name', 'Unit Type', 'Last Updated', 'Actions']" />
        @forelse ($units as $unit)
            <x-row-entry :columns="4">
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
                        <x-danger-button class="btn btn-delete">Delete</x-danger-button>
                    </form>
                </div>
            </x-row-entry>
        @empty
            <div class="py-12 text-center font-bold">
                <p>No units yet.</p>
            </div>
        @endforelse
    </x-content-wrap>
</x-app-layout>
