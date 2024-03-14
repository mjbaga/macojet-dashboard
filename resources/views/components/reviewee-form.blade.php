<div>
    <h2 class="text-center my-4 text-xl font-bold text-gray-800">
        {{ Str::ucfirst($boarder->profile_type) }} Info
    </h2>

    @php
        $reviewCenter = '';
        $reviewCenterAddress = '';
    @endphp

    <!-- Review Center -->
    <div class="mb-4">
        @if ($boarder->profileable)
            @php
                $reviewCenter = $boarder->profileable->review_center;
            @endphp
        @endif

        <x-input-label for="review_center" :value="__('Review Center')" />
        <x-text-input id="review_center" class="block mt-1 w-full" type="text" name="review_center" :value="$reviewCenter"
            required />
        <x-input-error :messages="$errors->get('review_center')" class="mt-2" />
    </div>

    <!-- Review Center Address -->
    <div class="mb-4">
        @if ($boarder->profileable)
            @php
                $reviewCenterAddress = $boarder->profileable->review_center_address;
            @endphp
        @endif

        <x-input-label for="review_center_address" :value="__('Review Center Address')" />
        <textarea name="review_center_address" id="review_center_address" rows="5" class="input-text">{{ $reviewCenterAddress }}</textarea>
        <x-input-error :messages="$errors->get('review_center_address')" class="mt-2" />
    </div>
</div>
