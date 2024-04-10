<div {{ $attributes->merge(['class' => 'flex-1']) }}>
    <div class="border border-slate-500">
        <div class="flex justify-between p-2 items-center">
            <h2 class="h2 py-2 my-0">Notes</h2>
            <button class="button" data-bs-toggle="modal" data-bs-target="#note-form">Create Note</button>
        </div>

        @forelse ($notes as $note)
            <div class="border-b border-slate-300 p-2 bg-green-100">
                <div class="flex justify-between gap-2">
                    <div class="flex flex-col">
                        <p class="text-xs text-slate-500">{{ $note->created_at->diffForHumans() }}</p>
                        <p>{{ $note->content }}</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="btn btn-dark btn-sm self-start" @click="showEditForm" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                            <span class="vh">Edit</span>
                        </button>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm index-delete-btn" data-bs-toggle="modal"
                                data-bs-target="#delete-modal" title="Delete">
                                <i class="bi bi-trash3-fill"></i>
                                <span class="vh">Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="grid py-8 place-items-center bg-green-200">
                <p>No notes yet.</p>
            </div>
        @endforelse

        <x-modal-confirm id="delete-modal" :title="'Confirm'">
            Are you sure you want to delete this note?
        </x-modal-confirm>
    </div>

    <livewire:popup-notes-create :model="$model" />
    <livewire:popup-notes-edit :model="$model" />
</div>
