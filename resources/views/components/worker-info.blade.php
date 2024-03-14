<div class="grid grid-cols-2 gap-2">
    <label>Company: </label>
    <p>{{ $boarder->profileable->company }}</p>
    <label>Company Address: </label>
    <div>{{ $boarder->profileable->company_address }}</div>
    <label>Position:</label>
    <p>{{ $boarder->profileable->position ? $boarder->profileable->position : '--' }}</p>
    <label>Schedule Type: </label>
    <p>{{ $boarder->profileable->schedule_type ? $boarder->profileable->schedule_type : '--' }}</p>
</div>
