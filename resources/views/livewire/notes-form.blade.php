<div id="note-form" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content py-4">
            <div class="modal-header border-b border-b-slate-300 mb-4">
                <h1 class="modal-title fs-5 px-4">
                    {{ $heading }} Note
                </h1>
            </div>
            <div class="modal-body px-4">
                <form wire:submit.prevent="addNote" method="POST" class="px-4">
                    <div class="grid gap-4" x-data="{ type: '{{ $note ? $note->type : null }}' }">
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

                        <button type="submit" class="btn btn-success">
                            {{ $heading === 'Add' ? 'Save' : 'Update' }} Note
                        </button>
                    </div>
                </form>
                <div class="w-full flex mt-2 px-4">
                    <button type="button" id="btn-cancel" class="btn btn-secondary w-full hover:pointer"
                        wire:click="$dispatch('closeModal')">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
