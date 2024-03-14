<div class="grid grid-cols-2 gap-2">
    <label>Schedule Type: </label>
    <p>{{ Str::ucfirst($boarder->profileable->schedule_type) }}</p>
    <label>Vaccine: </label>
    <p>{{ Str::ucfirst($boarder->profileable->vaccine) }}</p>
    <label>Home on Weekends </label>
    <p>{{ $boarder->profileable->home_on_weekends ? 'Yes' : 'No' }}</p>
</div>
