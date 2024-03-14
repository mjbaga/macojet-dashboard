<div class="grid grid-cols-2 gap-2">
    <label>Review Center: </label>
    <p>{{ Str::ucfirst($boarder->profileable->review_center) }}</p>
    <label>Review Center Address: </label>
    <div>{{ $boarder->profileable->review_center_address }}</div>
</div>
