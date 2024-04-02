<x-modal-popup id="booking-form" :title="'New Booking'">
    @if ($errors)
        <ul>
            @foreach ($errors as $error)
                <li>$error</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('transients.bookings.store', $transient) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-4">

            <!-- Units -->
            <div class="mb-4">
                <x-input-label for="unit_id" :value="__('Unit')" />
                <x-select name="unit_id">
                    @foreach (\App\Models\Unit::unitType('transient')->get() as $unit)
                        <option value="{{ $unit->id }}" @selected(old('unit_id') === $unit->id)>
                            {{ $unit->unit_name }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('unit_id')" class="mt-2" />
            </div>

            <!-- Date of Check In -->
            @php
                $now = \Carbon\Carbon::now()->format('Y-m-d');
            @endphp
            <div>
                <x-input-label for="check_in" :value="'Date of Check In:'" />
                <input type="date" name="check_in" id="check_in" class="input-text"
                    value="{{ old('check_in') ?? $now }}">
                <x-input-error :messages="$errors->get('check_in')" class="mt-2" />
            </div>

            <!-- Date of Check Out -->
            <div>
                <x-input-label for="check_out" :value="'Date of Check Out:'" />
                <input type="date" name="check_out" id="check_out" class="input-text"
                    value="{{ old('check_out') ?? $now }}">
                <x-input-error :messages="$errors->get('check_out')" class="mt-2" />
            </div>

            <!-- Number of Pax -->
            <div>
                <x-input-label for="number_of_pax" :value="'Number of Pax'" />
                <x-text-input id="number_of_pax" class="block mt-1 w-full" type="number" name="number_of_pax"
                    :value="old('number_of_pax') ?? 0" required />
                <x-input-error :messages="$errors->get('number_of_pax')" class="mt-2" />
            </div>

            <!-- Rate per person -->
            <div>
                <x-input-label for="rate" :value="'Rate per person'" />
                <x-text-input id="rate" class="block mt-1 w-full" type="number" name="rate" :value="old('rate') ?? 0"
                    required />
                <x-input-error :messages="$errors->get('rate')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</x-modal-popup>
