@section('page_title', 'Create Unit')
<x-app-layout>
    <x-page-heading :title="'Create New Unit'" />

    <x-content-wrap class="max-w-3xl mt-8">
        <form class="flex flex-col" action="{{ route('units.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h2 class="text-center mb-4 mt-4 text-xl font-bold text-gray-800">Unit Details</h2>

            <!-- Unit Name -->
            <div class="mb-4">
                <x-input-label for="unit_name" :value="__('Unit Name')" />
                <x-text-input id="unit_name" class="block mt-1 w-full" type="text" name="unit_name" :value="old('unit_name')"
                    required />
                <x-input-error :messages="$errors->get('unit_name')" class="mt-2" />
            </div>

            <!-- Unit Type -->
            <div class="mb-4">
                <x-input-label for="unit_type" :value="__('Unit Type')" />
                <x-select name="unit_type">
                    @foreach (\App\Models\Unit::$type as $index => $type)
                        <option value="{{ $type }}" {{ $index === 0 ? 'selected' : '' }}>
                            {{ Str::ucfirst($type) }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('unit_type')" class="mt-2" />
            </div>

            <button
                class="w-48 mx-auto rounded-md border border-transparent bg-green-500 px-2.5 py-1.5 text-center text-sm font-semibold text-white hover:text-green-500 shadow-sm hover:bg-green-200 ease-in duration-200 hover:border hover:border-green-500"
                type="submit">
                Create New Unit
            </button>
        </form>
    </x-content-wrap>
</x-app-layout>
