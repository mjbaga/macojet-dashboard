<x-modal-popup id="note-form" :title="'Add Note'" wire:ignore.self>
    @if ($errors)
        <ul>
            @foreach ($errors as $error)
                <li>$error</li>
            @endforeach
        </ul>
    @endif

    <form wire:submit.prevent="addNote" method="POST">
        <div class="grid gap-4" x-data="{ type: '' }">

            <!-- Type -->
            <div class="mb-4">
                <x-input-label for="type" :value="__('Type')" />
                <x-select id="note_type" wire:model="form.type"
                    @change="type = $event.target.options[$event.target.selectedIndex].value">
                    <option disabled">Select a type...</option>
                    @foreach (\App\Models\Note::$types as $key => $type)
                        <option value="{{ $key }}">
                            {{ $type }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('form.type')" class="mt-2" />
            </div>

            <!-- Note -->
            <div>
                <x-input-label :value="'Note'" />
                <textarea wire:model="form.content" name="form.content" rows="5" class="w-full rounded-md">{{ old('form.content') }}</textarea>
                <x-input-error :messages="$errors->get('form.content')" class="mt-2" />
            </div>

            <!-- Date of Check In -->
            @php
                $now = \Carbon\Carbon::now()->format('Y-m-d\TH:i:s');
            @endphp
            <div id="reminder_alarm_container" x-show="type == 'reminder'">
                <x-input-label value="Set Reminder:" />
                <input type="datetime-local" wire:model="form.reminder_alarm" class="input-text"
                    value="{{ $now }}">
                <x-input-error :messages="$errors->get('form.reminder_alarm')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-success">Save Note</button>
        </div>
    </form>
</x-modal-popup>
