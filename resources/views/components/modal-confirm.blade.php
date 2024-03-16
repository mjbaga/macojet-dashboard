<!-- Modal -->
<div class="modal fade confirm-modal" {{ $attributes }} tabindex="-1"
    aria-labelledby="{{ $attributes->get('id') . '-label' }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $attributes->get('id') . '-label' }}">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-cancel" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="btn-confirm" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
