@section('page_title', 'Edit ' . $transient->fullName)
<x-app-layout>
    <x-page-heading :title="'Edit ' . $transient->fullName" />

    <x-content-wrap class="max-w-3xl">
        <form class="flex flex-col" action="{{ route('transients.update', $transient) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h2 class="h2">Personal Info</h2>

            <!-- Gender -->
            <div class="mb-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <x-select name="gender">
                    @foreach (\App\Models\Boarder::$genders as $index => $gender)
                        <option value="{{ $gender }}" @selected($transient->gender === $gender)>
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
                    :value="$transient->first_name" required />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$transient->last_name"
                    required />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <!-- Date of Birth -->
            <div class="mb-4">
                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                <input type="date" name="date_of_birth" id="date_of_birth" class="input-text"
                    value="{{ $transient->date_of_birth }}">
                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
            </div>

            <!-- Origin Address -->
            <div class="mb-4">
                <x-input-label for="origin_address" :value="__('Origin Address')" />
                <textarea name="origin_address" id="origin_address" rows="5" class="input-text">{{ $transient->origin_address }}</textarea>
                <x-input-error :messages="$errors->get('origin_address')" class="mt-2" />
            </div>

            <!-- ID Card -->
            <div class="mb-4">
                @if ($transient->id_card)
                    <x-image-box class="mb-2" :src="asset('images/' . $transient->id_card)" :alt="$transient->fullName" />
                @endif

                <x-input-label for="identification" :value="__('ID Card')" />
                <input class="mt-1" type="file" id="identification" name="identification"
                    accept="image/png, image/jpeg, image/jpg" />
                <x-input-error :messages="$errors->get('identification')" class="mt-2" />
            </div>

            <!-- Contact Number -->
            <div class="mb-4">
                <x-input-label for="contact_number" :value="__('Contact Number')" />
                <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number"
                    :value="$transient->contact_number" required />
                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
            </div>

            <!-- FB Account Name -->
            <div class="mb-4">
                <x-input-label for="fb_account_name" :value="__('FB Account Name')" />
                <x-text-input id="fb_account_name" class="block mt-1 w-full" type="text" name="fb_account_name"
                    :value="$transient->fb_account_name" />
                <x-input-error :messages="$errors->get('fb_account_name')" class="mt-2" />
            </div>

            <div class="flex gap-2 justify-center">
                <button class="button-green" type="submit">
                    Update Transient
                </button>
                <x-link-button :href="route('transients.show', $transient)">
                    Cancel
                </x-link-button>
            </div>

        </form>
    </x-content-wrap>
</x-app-layout>
