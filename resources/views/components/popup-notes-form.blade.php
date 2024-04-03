<x-modal-popup id="note-form" :title="'Add Note'">
    @if ($errors)
        <ul>
            @foreach ($errors as $error)
                <li>$error</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="noteable_id" value="{{ $noteableId }}">
        <input type="hidden" name="noteable_type" value="{{ $noteableType }}">
        <div class="grid gap-4">

            <!-- Type -->
            <div class="mb-4">
                <x-input-label for="type" :value="__('Unit')" />
                <x-select id="note_type" name="type">
                    @foreach (\App\Models\Note::$types as $key => $type)
                        <option value="{{ $key }}" @selected(old('type') === $key)>
                            {{ $type }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <!-- Note -->
            <div>
                <x-input-label for="content" :value="'Note'" />
                <textarea name="content" id="content" rows="5" class="w-full rounded-md">{{ old('content') }}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <!-- Date of Check In -->
            @php
                $now = \Carbon\Carbon::now()->format('Y-m-d');
            @endphp
            <div id="reminder_alarm_container" class="hidden">
                <x-input-label for="reminder_alarm" :value="'Set Reminder:'" />
                <input type="datetime-local" name="reminder_alarm" id="reminder_alarm" class="input-text"
                    value="{{ old('reminder_alarm') ?? $now }}">
                <x-input-error :messages="$errors->get('reminder_alarm')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-success">Save Note</button>
        </div>
    </form>
</x-modal-popup>
