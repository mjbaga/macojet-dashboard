<div id="note-form" class="p-4" wire:ignore.self>
    <h2 class="h2 col-span-2">{{ $heading }} Note</h2>
    <form wire:submit.prevent="addNote" method="POST">
        <div class="flex flex-col" x-data="{ type: '{{ $note ? $note->type : null }}' }">
            <!-- Type -->
            <div>
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
            <div id="reminder_alarm_container" x-show="type == 'reminder'">
                <x-input-label value="Set Reminder:" />
                <input type="datetime-local" wire:model="form.reminder_alarm" class="input-text">
                <x-input-error :messages="$errors->get('form.reminder_alarm')" class="mt-2" />
            </div>

            <div class="flex col-span-2 justify-center my-4 gap-2">
                <button type="submit" class="btn btn-success flex-1">
                    {{ $heading === 'Add' ? 'Save' : 'Update' }} Note
                </button>
                <button type="button" id="btn-cancel" class="btn btn-danger hover:pointer flex-1"
                    wire:click.prevent="$dispatch('closeModal')">
                    Close
                </button>
            </div>
        </div>
    </form>
</div>
