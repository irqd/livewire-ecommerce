<div wire:ignore.self class="modal fade" id="deleteDocument-{{ $deleteDocument->id }}" tabindex="-1" aria-labelledby="deleteDocumentModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold" id="deleteDocumentModal">Delete Document</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to <span class="text-danger fw-bold">delete</span> the document 
            <span class="fw-bold">{{ $deleteDocument->name }}</span>? 
            This action cannot be undone. 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger shadow-sm" wire:click.prevent="deleteDocument({{ $deleteDocument->id }})">Delete</button>
            <button type="button" class="btn btn-outline-secondary shadow-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

