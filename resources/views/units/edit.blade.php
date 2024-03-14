@section('page_title', 'Edit ' . $unit->unit_name)
<x-app-layout>
    <x-page-heading :title="'Edit ' . $unit->unit_name" />

    <x-content-wrap class="max-w-xl">
        <form class="flex flex-col" action="{{ route('units.update', $unit) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h2 class="h2">Unit Details</h2>

            <!-- Unit Name -->
            <div class="mb-4">
                <x-input-label for="unit_name" :value="__('Unit Name')" />
                <x-text-input id="unit_name" class="block mt-1 w-full" type="text" name="unit_name" :value="$unit->unit_name"
                    required />
                <x-input-error :messages="$errors->get('unit_name')" class="mt-2" />
            </div>

            <!-- Unit Type -->
            <div class="mb-4">
                <x-input-label for="unit_type" :value="__('Unit Type')" />
                <x-select name="unit_type">
                    @foreach (\App\Models\Unit::$type as $index => $type)
                        <option value="{{ $type }}" {{ $unit->unit_type === $type ? 'selected' : '' }}>
                            {{ Str::ucfirst($type) }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('unit_type')" class="mt-2" />
            </div>

            <button
                class="w-48 mx-auto rounded-md border border-transparent bg-green-500 px-2.5 py-1.5 text-center text-sm font-semibold text-white hover:text-green-500 shadow-sm hover:bg-green-200 ease-in duration-200 hover:border hover:border-green-500"
                type="submit">
                Update Unit
            </button>
        </form>

    </x-content-wrap>

    <x-content-wrap class="max-w-xl my-8">

        <h2 class="h2">Current Rooms for {{ $unit->unit_name }}</h2>

        <div class="pb-4 ">
            <x-heading-entry :headings="['Room Name', 'Capacity']" />
            @forelse ($unit->rooms as $room)
                <x-row-entry :columns="2">
                    <div class="">{{ $room->room_number }}</div>
                    <div class="justify-self-end">{{ $room->capacity }}</div>
                </x-row-entry>
            @empty
                <div>No rooms added yet.</div>
            @endforelse

            @if ($unit->rooms)
                <x-row-entry :columns="2">
                    <div class="">Total capacity</div>
                    <div class="justify-self-end">{{ $unit->total_capacity }}</div>
                </x-row-entry>
            @endif
        </div>

        <h2 class="text-center mb-4 mt-8 text-xl font-bold text-gray-800">Add Rooms to {{ $unit->unit_name }}</h2>

        <form class="flex flex-col" action="{{ route('units.rooms.store', $unit) }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-input-label for="room_number" :value="__('Room Name')" />
                <x-text-input id="room_number" class="block mt-1 w-full" type="text" name="room_number" required />
                <x-input-error :messages="$errors->get('room_number')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="capacity" :value="__('Capacity')" />
                <x-text-input id="capacity" class="block mt-1 w-full" type="number" name="capacity" required />
                <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
            </div>

            <button
                class="w-48 mx-auto rounded-md border border-transparent bg-green-500 px-2.5 py-1.5 text-center text-sm font-semibold text-white hover:text-green-500 shadow-sm hover:bg-green-200 ease-in duration-200 hover:border hover:border-green-500"
                type="submit">Add New Room</button>
        </form>
    </x-content-wrap>
</x-app-layout>
