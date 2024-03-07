<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="section-heading">
                Boarders
            </h2>
            <div class="actions">
                <x-link-button :href="route('boarders.create')">
                    Add New Boarder
                </x-link-button>
            </div>
        </div>
    </x-slot>

    <x-content-wrap class="max-w-7xl">
        <x-heading-entry :headings="['Name', 'Email', 'Last Updated', 'Actions']" />
        @forelse ($boarders as $boarder)
            <x-row-entry :columns="4">
                <div>{{ $boarder->first_name }} {{ $boarder->last_name }}</div>
                <div>{{ $boarder->email }}</div>
                <div>{{ $boarder->updated_at->diffForHumans() }}</div>
                <div class="flex gap-2">
                    <x-link-button :href="route('boarders.edit', $boarder->id)">Edit</x-link-button>
                    <button>Delete</button>
                </div>
            </x-row-entry>
        @empty
            <p>No boarders yet.</p>
        @endforelse
    </x-content-wrap>
</x-app-layout>
