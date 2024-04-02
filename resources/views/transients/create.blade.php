@section('page_title', 'Add New Transient')
<x-app-layout>
    <x-page-heading :title="'Add New Transient'" />

    <x-content-wrap class="max-w-3xl">
        <form class="flex flex-col" action="{{ route('transients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h2 class="h2">Personal Info</h2>

            <!-- Gender -->
            <div class="mb-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <x-select name="gender">
                    @foreach (\App\Models\Boarder::$genders as $index => $gender)
                        <option value="{{ $gender }}" @selected(old('gender') === $gender)>
                            {{ Str::ucfirst($gender) }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- First Name -->
            <div class="mb-4">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('first_name')" required />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                    required />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <!-- Date of Birth -->
            <div class="mb-4">
                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                <input type="date" name="date_of_birth" id="date_of_birth" class="input-text"
                    value="{{ old('date_of_birth') }}">
                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
            </div>

            <!-- Origin Address -->
            <div class="mb-4">
                <x-input-label for="origin_address" :value="__('Origin Address')" />
                <textarea name="origin_address" id="origin_address" rows="5" class="input-text">{{ old('origin_address') }}</textarea>
                <x-input-error :messages="$errors->get('origin_address')" class="mt-2" />
            </div>

            <!-- ID Card -->
            <div class="mb-4">
                <x-input-label for="identification" :value="__('ID Card')" />
                <input class="mt-1" type="file" id="identification" name="identification"
                    accept="image/png, image/jpeg, image/jpg" />
                <x-input-error :messages="$errors->get('identification')" class="mt-2" />
            </div>

            <!-- Contact Number -->
            <div class="mb-4">
                <x-input-label for="contact_number" :value="__('Contact Number')" />
                <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number"
                    :value="old('contact_number')" required />
                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
            </div>

            <!-- FB Account Name -->
            <div class="mb-4">
                <x-input-label for="fb_account_name" :value="__('FB Account Name')" />
                <x-text-input id="fb_account_name" class="block mt-1 w-full" type="text" name="fb_account_name"
                    :value="old('fb_account_name')" />
                <x-input-error :messages="$errors->get('fb_account_name')" class="mt-2" />
            </div>

            <button class="button-green" type="submit">
                Add Transient
            </button>

        </form>
    </x-content-wrap>
</x-app-layout>
