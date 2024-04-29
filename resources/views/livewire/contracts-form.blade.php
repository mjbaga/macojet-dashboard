<div class="contract-form max-w-7xl p-4" wire:ignore.self>
    <h2 class="h2">{{ $heading === 'Edit' ? 'Edit' : 'New' }} Lease Agreement/Contract</h2>

    @forelse($errors as $error)
        <li>{{ $error }} </li>
    @empty
    @endforelse

    <form wire:submit.prevent="processContract" class="grid grid-cols-2 gap-x-8 gap-y-4" enctype="multipart/form-data">
        <!-- Unit Select -->
        <div>
            <x-input-label for="unit_id" :value="__('Select Unit')" />
            <x-select name="unit_id" id="unit_id" wire:model="form.unit_id"
                @change="$wire.getRooms($event.target.options[$event.target.selectedIndex].value)">
                <option>Select Unit</option>
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}">
                        {{ $unit->unit_name }}
                    </option>
                @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('form.unit_id')" class="mt-2" />
        </div>

        <!-- Room Select -->
        <div>
            <x-input-label for="room_id" :value="__('Select Room')" />
            <x-select name="room_id" id="room_id" wire:model="form.room_id">
                @forelse ($rooms as $room)
                    <option value="{{ $room->id }}">
                        {{ $room->room_number }}
                    </option>
                @empty
                    <option>Select a unit first</option>
                @endforelse
            </x-select>
            <x-input-error :messages="$errors->get('form.room_id')" class="mt-2" />
        </div>

        <!-- Start Date -->
        <div>
            <x-input-label for="start_date" :value="__('Start Date')" />
            <input type="date" name="start_date" id="start_date" class="input-text" value="{{ old('start_date') }}"
                wire:model="form.start_date">
            <x-input-error :messages="$errors->get('form.start_date')" class="mt-2" />
        </div>

        <!-- End Date -->
        <div>
            <x-input-label for="end_date" :value="__('End Date')" />
            <input type="date" name="end_date" id="end_date" class="input-text" value="{{ old('end_date') }}"
                wire:model="form.end_date">
            <x-input-error :messages="$errors->get('form.end_date')" class="mt-2" />
        </div>

        <!-- Terms of Payment -->
        <div>
            <x-input-label for="terms_of_payment" :value="__('Terms of Payment')" />
            <x-select name="terms_of_payment" id="terms_of_payment" wire:model="form.terms_of_payment">
                @php
                    $default = old('terms_of_payment') ? old('form.terms_of_payment') : 'monthly';
                @endphp

                <option>Select terms of payment</option>

                @foreach (App\Models\LeaseAgreement::$terms as $index => $term)
                    <option value="{{ $term }}">
                        {{ Str::ucfirst($term) }}
                    </option>
                @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('form.terms_of_payment')" class="mt-2" />
        </div>

        <!-- Agreed Payment -->
        <div>
            <x-input-label for="agreed_payment" :value="__('Agreed Payment Amount')" />
            <x-text-input id="agreed_payment" class="block mt-1 w-full" type="number" name="agreed_payment"
                :value="old('agreed_payment') ?? 0" wire:model="form.agreed_payment" />
            <x-input-error :messages="$errors->get('form.agreed_payment')" class="mt-2" />
        </div>

        <!-- Months Deposit -->
        <div>
            <x-input-label for="months_deposit" :value="__('Months Deposit')" />
            <x-text-input id="months_deposit" class="block mt-1 w-full" type="number" name="months_deposit"
                :value="old('months_deposit') ?? 0" wire:model="form.months_deposit" />
            <x-input-error :messages="$errors->get('form.months_deposit')" class="mt-2" />
        </div>

        <!-- Deposit Amount -->
        <div>
            <x-input-label for="deposit_amount" :value="__('Total Deposit Amount')" />
            <x-text-input id="deposit_amount" class="block mt-1 w-full" type="number" name="deposit_amount"
                :value="old('deposit_amount') ?? 0" wire:model="form.deposit_amount" />
            <x-input-error :messages="$errors->get('form.deposit_amount')" class="mt-2" />
        </div>

        <!-- Includes City Services -->
        <div class="flex gap-2 items-center">
            <input type="checkbox" name="includes_city_services" class="cursor-pointer" id="includes_city_services"
                @checked(old('includes_city_services')) wire:model="form.includes_city_services">
            <x-input-label for="includes_city_services" class="cursor-pointer" :value="__('Includes City Services')" />
        </div>

        @if ($contract)
            <!-- Deposit Refunded -->
            <div class="mb-4 mt-4 flex gap-2 items-center">
                <input type="checkbox" name="deposit_refunded" class="cursor-pointer" id="deposit_refunded"
                    @checked($contract->deposit_refunded)>
                <x-input-label for="deposit_refunded" class="cursor-pointer" :value="__('Deposit Refunded')" />
            </div>

            <!-- Will Renew -->
            <div class="mb-4 mt-4 flex gap-2 items-center">
                <input type="checkbox" name="will_renew" class="cursor-pointer" id="will_renew"
                    @checked($contract->will_renew)>
                <x-input-label for="will_renew" class="cursor-pointer" :value="__('Will Renew')" />
            </div>
        @endif

        <!-- Contract Document -->
        <div>
            <x-input-label for="contract_document" :value="__('Contract Document')" />
            <input class="mt-1" type="file" id="contract_document" name="contract_document"
                accept=".doc,.docx,.pdf" wire:model="form.contract_document" />
            <x-input-error :messages="$errors->get('contract_document')" class="mt-2" />
        </div>

        <div class="flex col-span-2 justify-center my-4 gap-2">
            <button class="btn btn-success w-48" type="submit">
                {{ $heading === 'Edit' ? 'Update Contract Details' : 'Create New Contract' }}
            </button>
            <button class="btn btn-danger w-48" wire:click.prevent="$dispatch('closeModal')">
                Cancel
            </button>
        </div>


    </form>
</div>
