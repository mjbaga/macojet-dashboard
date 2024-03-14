<div>
    <h2 class="text-center my-4 text-xl font-bold text-gray-800">
        {{ Str::ucfirst($boarder->profile_type) }} Info
    </h2>

    @php
        $home = 0;
        $vaxVal = '';
        $schedVal = '';
    @endphp

    <!-- Schedule Type -->
    <div class="mb-4">
        <x-input-label for="schedule_type" :value="__('Schedule Type')" />
        <x-select name="schedule_type">
            @foreach (\App\Models\StudentProfile::$schedule as $sched)
                @if ($boarder->profileable)
                    @php
                        $schedVal = $boarder->profileable->schedule_type === $sched ? 'selected' : '';
                    @endphp
                @endif

                <option value="{{ $sched }}" }} {{ $schedVal }}>
                    {{ Str::ucfirst($sched) }}
                </option>
            @endforeach
        </x-select>
        <x-input-error :messages="$errors->get('schedule_type')" class="mt-2" />
    </div>

    <!-- Vaccine Type -->
    <div class="mb-4">
        <x-input-label for="vaccine" :value="__('Vaccine')" />
        <x-select name="vaccine">
            @foreach (\App\Models\StudentProfile::$vaccine as $vax)
                @if ($boarder->profileable)
                    @php
                        $vaxVal = $boarder->profileable->vaccine === $vax ? 'selected' : '';
                    @endphp
                @endif

                <option value="{{ $vax }}" {{ $boarder->profileable->vaccine ?? 'selected' }}
                    {{ $vaxVal }}>
                    {{ Str::ucfirst($vax) }}
                </option>
            @endforeach
        </x-select>
        <x-input-error :messages="$errors->get('vaccine')" class="mt-2" />
    </div>

    <!-- Home on weekends -->
    <div class="mb-4">
        <x-input-label for="home_on_weekends" :value="__('Home on Weekends')" />
        <x-select name="home_on_weekends">
            @if ($boarder->profileable)
                @php
                    $home = $boarder->profileable->home_on_weekends;
                @endphp
            @endif
            <option value="1" {{ $home ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !$home ? 'selected' : '' }}>No</option>
        </x-select>
        <x-input-error :messages="$errors->get('home_on_weekends')" class="mt-2" />
    </div>
</div>
