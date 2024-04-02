@section('page_title', 'New Lease Agreement for ' . $boarder->fullName)
<x-app-layout>
    <x-page-heading :title="'New Lease Agreement for ' . $boarder->fullName" />

    <x-content-wrap class="max-w-3xl contract-form">
        <form class="flex flex-col" action="{{ route('boarders.contracts.store', $boarder) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <h2 class="h2">Lease Agreement</h2>

            <!-- Unit Select -->
            <div class="mb-4">
                <x-input-label for="unit_id" :value="__('Select Unit')" />
                <x-select name="unit_id" id="unit_id">
                    <option>Select Unit</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">
                            {{ $unit->unit_name }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('unit_id')" class="mt-2" />
            </div>

            <!-- Room Select -->
            <div class="mb-4">
                <x-input-label for="room_id" :value="__('Select Room')" />
                <x-select name="room_id" id="room_id">
                    <option>Select Room</option>
                </x-select>
                <x-input-error :messages="$errors->get('room_id')" class="mt-2" />
            </div>

            <!-- Start Date -->
            <div class="mb-4">
                <x-input-label for="start_date" :value="__('Start Date')" />
                <input type="date" name="start_date" id="start_date" class="input-text"
                    value="{{ old('start_date') }}">
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>

            <!-- End Date -->
            <div class="mb-4">
                <x-input-label for="end_date" :value="__('End Date')" />
                <input type="date" name="end_date" id="end_date" class="input-text" value="{{ old('end_date') }}">
                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            </div>

            <!-- Contract Document -->
            <div class="mb-4">
                <x-input-label for="contract_doc" :value="__('Contract Document')" />
                <input class="mt-1" type="file" id="contract_doc" name="contract_doc" accept=".doc,.docx,.pdf" />
                <x-input-error :messages="$errors->get('contract_doc')" class="mt-2" />
            </div>

            <!-- Months Deposit -->
            <div class="mb-4">
                <x-input-label for="months_deposit" :value="__('Months Deposit')" />
                <x-text-input id="months_deposit" class="block mt-1 w-full" type="number" name="months_deposit"
                    :value="old('months_deposit') ?? 0" required />
                <x-input-error :messages="$errors->get('months_deposit')" class="mt-2" />
            </div>

            <!-- Deposit Amount -->
            <div class="mb-4">
                <x-input-label for="deposit_amount" :value="__('Total Deposit Amount')" />
                <x-text-input id="deposit_amount" class="block mt-1 w-full" type="number" name="deposit_amount"
                    :value="old('deposit_amount') ?? 0" required />
                <x-input-error :messages="$errors->get('deposit_amount')" class="mt-2" />
            </div>

            <!-- Includes City Services -->
            <div class="mb-4 mt-4 flex gap-2 items-center">
                <input type="checkbox" name="includes_city_services" class="cursor-pointer" id="includes_city_services"
                    @checked(old('includes_city_services'))>
                <x-input-label for="includes_city_services" class="cursor-pointer" :value="__('Includes City Services')" />
            </div>

            <button class="button-green" type="submit">
                Create New Contract
            </button>

        </form>
    </x-content-wrap>
</x-app-layout>
