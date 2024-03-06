<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="section-heading">
                Add a new boarder
            </h2>
        </div>
    </x-slot>

    <x-content-wrap class="max-w-3xl">
        <form action="{{ route('boarders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h2 class="text-center mx-4 text-xl font-bold text-gray-800">Personal Info</h2>

            <!-- Profile Type -->
            <div class="mb-4">
                <x-input-label for="profile_type" :value="__('Profile Type')" />
                <x-select>
                    @foreach (\App\Models\Boarder::$type as $index => $type)
                        <option value="{{ $type }}" {{ $index === 0 ? 'selected' : '' }}>
                            {{ Str::ucfirst($type) }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('profile_type')" class="mt-2" />
            </div>

            <!-- First Name -->
            <div class="mb-4">
                <x-input-label for="first-name" :value="__('First Name')" />
                <x-text-input id="first-name" class="block mt-1 w-full" type="text" name="first-name"
                    :value="old('first-name')" required />
                <x-input-error :messages="$errors->get('first-name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <x-input-label for="last-name" :value="__('Last Name')" />
                <x-text-input id="last-name" class="block mt-1 w-full" type="text" name="last-name" :value="old('last-name')"
                    required />
                <x-input-error :messages="$errors->get('last-name')" class="mt-2" />
            </div>

            <!-- Nickname -->
            <div class="mb-4">
                <x-input-label for="nickname" :value="__('Nickname')" />
                <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname"
                    :value="old('nickname')" />
                <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
            </div>

            <!-- Nickname -->
            <div class="mb-4">
                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                <input type="date" class="input-text">
                <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
            </div>

            <!-- Provincial Address -->
            <div class="mb-4">
                <x-input-label for="provincial_address" :value="__('Provincial Address')" />
                <textarea name="provincial_address" id="provincial_address" rows="5" class="input-text">{{ old('provincial_address') }}</textarea>
                <x-input-error :messages="$errors->get('provincial_address')" class="mt-2" />
            </div>

            <!-- Profile Picture -->
            <div class="mb-4">
                <x-input-label for="profile_pic" :value="__('Profile Image')" />
                <input class="mt-1" type="file" id="profile_pic" name="profile_pic"
                    accept="image/png, image/jpeg" />
                <x-input-error :messages="$errors->get('profile_pic')" class="mt-2" />
            </div>

            <h2 class="text-center mt-8 mb-4 text-xl font-bold text-gray-800">Contact Info</h2>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

        </form>
    </x-content-wrap>
</x-app-layout>
