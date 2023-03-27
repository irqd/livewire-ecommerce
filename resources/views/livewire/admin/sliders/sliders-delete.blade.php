<!-- Modal -->
<div class="modal fade" id="deleteSlider-{{ $deleteSlider->id }}" tabindex="-1" aria-labelledby="deleteBrandModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold" id="deleteBrandModal">Delete Slider</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to <span class="text-danger fw-bold">delete</span> the slider 
          <span class="fw-bold">{{ $deleteSlider->title }}</span>? 
          This action cannot be undone.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger shadow-sm" wire:click.prevent="deleteSlider({{  $deleteSlider->id }})">Delete</button>
            <button type="button" class="btn btn-outline-secondary shadow-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

