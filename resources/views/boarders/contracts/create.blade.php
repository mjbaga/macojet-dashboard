@section('page_title', 'New Lease Agreement for ' . $boarder->fullName)
<x-app-layout>
    <x-page-heading :title="'New Lease Agreement for ' . $boarder->fullName" />

    <x-content-wrap class="max-w-3xl create-contract">
        <form class="flex flex-col" action="" method="POST" enctype="multipart/form-data">
            @csrf

            <h2 class="h2">Lease Agreement</h2>

            <!-- Unit Select -->
            <div class="mb-4">
                <x-input-label for="unit_id" :value="__('Select Unit')" />
                <x-select name="unit_id" id="unit_id">
                    <option value="0">Select Unit</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('unit_id')" class="mt-2" />
            </div>

            <!-- Room Select -->
            <div class="mb-4">
                <x-input-label for="room_id" :value="__('Select Room')" />
                <x-select name="room_id" id="room_id">
                    <option value="0">Select Room</option>
                </x-select>
                <x-input-error :messages="$errors->get('room_id')" class="mt-2" />
            </div>

        </form>
    </x-content-wrap>
</x-app-layout>
