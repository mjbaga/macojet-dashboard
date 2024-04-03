<div {{ $attributes->merge(['class' => 'flex-1']) }}>
    <div class="border border-slate-500">
        <div class="flex justify-between p-2 items-center">
            <h2 class="h2 py-2 my-0">Notes</h2>
            <button class="button" data-bs-toggle="modal" data-bs-target="#note-form">Create Note</button>
        </div>

        @forelse ($notes as $note)
            <div class="border-b border-slate-300 p-2 bg-green-100">

                <div class="flex justify-between">
                    <div class="flex flex-col">
                        <p class="text-xs text-slate-500">{{ $note->created_at->diffForHumans() }}</p>
                        <p>{{ $note->content }}</p>
                    </div>
                    <button class="button" data-bs-toggle="modal" data-bs-target="#note-form">Edit</button>
                </div>

            </div>
        @empty
            <div class="grid py-8 place-items-center bg-green-200">
                <p>No notes yet.</p>
            </div>
        @endforelse


    </div>
</div>
