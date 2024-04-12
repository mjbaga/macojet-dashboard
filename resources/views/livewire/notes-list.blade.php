<div class="flex-1">
    <div class="border border-slate-500 ">
        <div class="flex justify-between p-2 items-center">
            <h2 class="h2 py-2 my-0">Notes</h2>
            @php
                $noteableType = App\Services\Utils::getClassName($model);
            @endphp

            <button class="button"
                wire:click.prevent="$dispatch('openModal', { component: 'notes-modal', arguments: { noteableId: {{ $model->id }}, noteableType: '{{ $noteableType }}'
                } })">
                Create Note
            </button>
        </div>

        <div class="overflow-y-scroll max-h-96">
            @forelse ($notes as $note)
                <div class="border-b border-slate-300 p-2 {{ $note->resolved ? 'bg-green-100' : 'bg-red-100' }}">
                    <div class="flex justify-between gap-2">
                        <div class="flex flex-col gap-2">
                            <p class="text-xs text-slate-500">{{ $note->created_at->diffForHumans() }}</p>
                            <p>{{ $note->content }}</p>
                            <button class="btn btn-light btn-sm align-self w-32"
                                wire:click="toggleResolved({{ $note }})">Mark as
                                {{ $note->resolved ? 'unresolved' : 'resolved' }}</button>
                        </div>
                        <div class="flex gap-2">
                            <button class="btn btn-dark btn-sm self-start"
                                wire:click="$dispatch('openModal', { component: 'notes-modal', arguments: { note: {{ $note->id }} }})"
                                title="Edit">
                                <i class="bi bi-pencil-square"></i>
                                <span class="vh">Edit</span>
                            </button>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm index-delete-btn"
                                    data-bs-toggle="modal" data-bs-target="#delete-modal" title="Delete">
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
        </div>

        <x-modal-confirm id="delete-modal" :title="'Confirm'">
            Are you sure you want to delete this note?
        </x-modal-confirm>
    </div>

</div>
