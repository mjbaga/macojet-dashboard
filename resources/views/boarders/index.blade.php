@section('page_title', 'Boarders')
<x-app-layout>
    <x-page-heading :title="'Boarders'" :actions="[['href' => 'boarders.create', 'title' => 'Create New Boarder']]" />

    <x-content-wrap class="max-w-7xl">
        <x-heading-entry :headings="['Name', 'Email', 'Last Updated', 'Actions']" />
        @forelse ($boarders as $boarder)
            <x-row-entry :columns="4">
                <div>
                    <a href="{{ route('boarders.show', $boarder) }}" class="text-slate-500">
                        {{ $boarder->fullName }}
                    </a>
                </div>
                <div>{{ $boarder->email }}</div>
                <div>{{ $boarder->updated_at->diffForHumans() }}</div>
                <div class="flex gap-2 justify-end">
                    <x-link-button :href="route('boarders.edit', $boarder->id)">Edit</x-link-button>
                    <form action="{{ route('boarders.destroy', $boarder) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-danger-button class="btn btn-delete">Delete</x-danger-button>
                    </form>
                </div>
            </x-row-entry>
        @empty
            <p>No boarders yet.</p>
        @endforelse
        <div class="my-4">
            {{ $boarders->links() }}
        </div>
    </x-content-wrap>
</x-app-layout>
