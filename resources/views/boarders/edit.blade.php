<x-app-layout>
    <x-page-heading :title="'Boarders'" />

    <div x-data="{ personal: true, contact: false, extra: false }" class="py-10">

        <div class="tabs max-w-2xl mx-auto">
            <button x-bind:class="personal ? 'tab-active' : ''" class="tab"
                x-on:click="personal = true, contact = false, extra = false ">
                Personal Info
            </button>
            <button x-bind:class="contact ? 'tab-active' : ''" class="tab"
                x-on:click="personal = false, contact = true, extra = false">Contact Info</button>
            <button x-bind:class="extra ? 'tab-active' : ''" class="tab"
                x-on:click="personal = false, contact = false, extra = true ">{{ Str::ucfirst($boarder->profile_type) }}
                Info</button>
        </div>

        <x-content-wrap class="max-w-2xl py-0 sm:rounded-tl-none">

            <form class="flex flex-col" action="{{ route('boarders.update', $boarder) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grow flex-1" x-show="personal" x-transition>

                    <h2 class="text-center my-4 text-xl font-bold text-gray-800">Personal Info</h2>

                    <!-- Profile Type -->
                    <div class="mb-4">
                        <x-input-label :value="__('Profile Type')" />
                        <x-select disabled>
                            @foreach (\App\Models\Boarder::$type as $type)
                                <option value="{{ $type }}"
                                    {{ $type === $boarder->profile_type ? 'selected' : '' }}>
                                    {{ Str::ucfirst($type) }}
                                </option>
                            @endforeach
                        </x-select>
                        <p class="font-semibold italic text-xs pt-2 pl-2">
                            Profile type cannot be changed.
                        </p>
                    </div>

                    <!-- First Name -->
                    <div class="mb-4">
                        <x-input-label for="first_name" :value="__('First Name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                            :value="$boarder->first_name" required />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <!-- Last Name -->
                    <div class="mb-4">
                        <x-input-label for="last_name" :value="__('Last Name')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                            :value="$boarder->last_name" required />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>

                    <!-- Nickname -->
                    <div class="mb-4">
                        <x-input-label for="nickname" :value="__('Nickname')" />
                        <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname"
                            :value="$boarder->nickname" />
                        <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
                    </div>

                    <!-- Date of Birth -->
                    <div class="mb-4">
                        <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                        <input type="date" name="date_of_birth" id="date_of_birth" class="input-text"
                            value="{{ $boarder->date_of_birth }}">
                        <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                    </div>

                    <!-- Provincial Address -->
                    <div class="mb-4">
                        <x-input-label for="provincial_address" :value="__('Provincial Address')" />
                        <textarea name="provincial_address" id="provincial_address" rows="5" class="input-text">{{ $boarder->provincial_address }}</textarea>
                        <x-input-error :messages="$errors->get('provincial_address')" class="mt-2" />
                    </div>

                    <!-- Profile Picture -->
                    <div class="mb-4">
                        @if ($boarder->profile_pic)
                            <div class="py-4 border w-1/4 border-slate-300">
                                <img src="{{ asset('images/' . $boarder->profile_pic) }}"
                                    alt="{{ $boarder->fullName() }}">
                            </div>
                        @endif
                        <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                        <input class="mt-1" type="file" id="profile_picture" name="profile_picture"
                            accept="image/png, image/jpeg, image/jpg" />
                        <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                    </div>

                </div>

                <div div class="grow flex-1" x-show="contact" x-transition>

                    <h2 class="text-center my-4 text-xl font-bold text-gray-800">Contact Info</h2>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="$boarder->email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contact Number -->
                    <div class="mb-4">
                        <x-input-label for="contact_number" :value="__('Contact Number')" />
                        <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number"
                            :value="$boarder->contact_number" required />
                        <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                    </div>

                    <!-- FB Account Name -->
                    <div class="mb-4">
                        <x-input-label for="fb_account_name" :value="__('FB Account Name')" />
                        <x-text-input id="fb_account_name" class="block mt-1 w-full" type="text"
                            name="fb_account_name" :value="$boarder->fb_account_name" />
                        <x-input-error :messages="$errors->get('fb_account_name')" class="mt-2" />
                    </div>

                    <!-- Name of Father -->
                    <div class="mb-4">
                        <x-input-label for="name_of_father" :value="__('Name of Father')" />
                        <x-text-input id="name_of_father" class="block mt-1 w-full" type="text" name="name_of_father"
                            :value="$boarder->name_of_father" />
                        <x-input-error :messages="$errors->get('name_of_father')" class="mt-2" />
                    </div>

                    <!-- Father's Contact Number -->
                    <div class="mb-4">
                        <x-input-label for="father_contact" :value="__('Father\'s Contact Number')" />
                        <x-text-input id="father_contact" class="block mt-1 w-full" type="text"
                            name="father_contact" :value="$boarder->father_contact" />
                        <x-input-error :messages="$errors->get('father_contact')" class="mt-2" />
                    </div>

                    <!-- Name of Mother -->
                    <div class="mb-4">
                        <x-input-label for="name_of_mother" :value="__('Name of Mother')" />
                        <x-text-input id="name_of_mother" class="block mt-1 w-full" type="text"
                            name="name_of_mother" :value="$boarder->name_of_mother" />
                        <x-input-error :messages="$errors->get('name_of_mother')" class="mt-2" />
                    </div>

                    <!-- Mothers's Contact Number -->
                    <div class="mb-4">
                        <x-input-label for="mother_contact" :value="__('Mother\'s Contact Number')" />
                        <x-text-input id="mother_contact" class="block mt-1 w-full" type="text"
                            name="mother_contact" :value="$boarder->mother_contact" />
                        <x-input-error :messages="$errors->get('mother_contact')" class="mt-2" />
                    </div>

                    <!-- Name of Guardian -->
                    <div class="mb-4">
                        <x-input-label for="name_of_guardian" :value="__('Name of Guardian')" />
                        <x-text-input id="name_of_guardian" class="block mt-1 w-full" type="text"
                            name="name_of_guardian" :value="$boarder->name_of_guardian" />
                        <x-input-error :messages="$errors->get('name_of_guardian')" class="mt-2" />
                    </div>

                    <!-- Guardian\'s Contact Number -->
                    <div class="mb-4">
                        <x-input-label for="guardian_contact" :value="__('Guardian\'s Contact Number')" />
                        <x-text-input id="guardian_contact" class="block mt-1 w-full" type="text"
                            name="guardian_contact" :value="$boarder->guardian_contact" />
                        <x-input-error :messages="$errors->get('guardian_contact')" class="mt-2" />
                    </div>

                </div>


                <div div class="grow flex-1" x-show="extra" x-transition>
                    @if ($boarder->profile_type === 'working')
                        <x-worker-info :boarder="$boarder" />
                    @elseif ($boarder->profile_type === 'reviewee')
                        <x-reviewee-info :boarder="$boarder" />
                    @elseif ($boarder->profile_type === 'student')
                        <x-student-info :boarder="$boarder" />
                    @endif
                </div>

                <button
                    class="w-48 mx-auto rounded-md border border-transparent bg-green-500 px-2.5 py-1.5 text-center text-sm font-semibold text-white hover:text-green-500 shadow-sm hover:bg-green-200 ease-in duration-200 hover:border hover:border-green-500"
                    type="submit">
                    Update Boarder
                </button>

            </form>


        </x-content-wrap>

    </div>
</x-app-layout>
