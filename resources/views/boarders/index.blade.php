@section('page_title', 'Boarders')
<x-app-layout>
    <x-page-heading :title="'Boarders'" :actions="[['href' => route('boarders.create'), 'title' => 'Add New Boarder']]" />

    <x-content-wrap class="max-w-7xl">
        <x-entry-heading :headings="['Name', 'Email', 'Last Updated', 'Status', 'Actions']" />
        @forelse ($boarders as $boarder)
            <x-entry-row :columns="5">
                <div>
                    <a href="{{ route('boarders.show', $boarder) }}" class="text-slate-500">
                        {{ $boarder->fullName }}
                    </a>
                </div>
                <div>{{ $boarder->email }}</div>
                <div>{{ $boarder->updated_at->diffForHumans() }}</div>
                <div>{{ $boarder->isCurrentBoarder() ? 'Current' : 'Ended' }}</div>
                <div class="flex gap-2 justify-end">
                    <x-link-button class="btn-sm" :href="route('boarders.edit', $boarder->id)" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                        <span class="vh">Edit</span>
                    </x-link-button>
                    <form action="{{ route('boarders.destroy', $boarder) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger index-delete-btn" data-bs-toggle="modal"
                            data-bs-target="#delete-modal" title="Delete">
                            <i class="bi bi-trash3-fill"></i>
                            <span class="vh">Delete</span>
                        </button>
                    </form>
                </div>
            </x-entry-row>
        @empty
            <p>No boarders yet.</p>
        @endforelse
        <div class="my-4">
            {{ $boarders->links() }}
        </div>

        @if ($boarders)
            <x-modal-confirm id="delete-modal" :title="'Confirm'">
                Are you sure you want to delete this boarder?
            </x-modal-confirm>
        @endif
    </x-content-wrap>
</x-app-layout>
