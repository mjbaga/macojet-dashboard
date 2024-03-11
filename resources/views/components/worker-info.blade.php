<div>
    <h2 class="text-center my-4 text-xl font-bold text-gray-800">
        {{ Str::ucfirst($boarder->profile_type) }} Info
    </h2>

    @php
        $company = '';
        $companyAddress = '';
        $position = '';
        $scheduleType = '';
    @endphp

    <!-- Company -->
    <div class="mb-4">
        @if ($boarder->profileable)
            @php
                $company = $boarder->profileable->company;
            @endphp
        @endif

        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="$company" required />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <!-- Company Address -->
    <div class="mb-4">
        @if ($boarder->profileable)
            @php
                $companyAddress = $boarder->profileable->company_address;
            @endphp
        @endif

        <x-input-label for="company_address" :value="__('Company Address')" />
        <textarea name="company_address" id="company_address" rows="5" class="input-text">{{ $companyAddress }}</textarea>
        <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
    </div>

    <!-- Position -->
    <div class="mb-4">
        @if ($boarder->profileable)
            @php
                $position = $boarder->profileable->position;
            @endphp
        @endif

        <x-input-label for="position" :value="__('Position')" />
        <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="$position" />
        <x-input-error :messages="$errors->get('position')" class="mt-2" />
    </div>

    <!-- Schedule Type -->
    <div class="mb-4">
        @if ($boarder->profileable)
            @php
                $scheduleType = $boarder->profileable->schedule_type;
            @endphp
        @endif

        <x-input-label for="schedule_type" :value="__('Schedule Type')" />
        <x-text-input id="schedule_type" class="block mt-1 w-full" type="text" name="schedule_type"
            :value="$scheduleType" />
        <x-input-error :messages="$errors->get('schedule_type')" class="mt-2" />
    </div>
</div>
