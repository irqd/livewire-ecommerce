<div>
    @if(session()->has('success'))
        <div wire:poll.3s="hide" class="alert alert-success mb-0 mt-3" role="alert" :wire:key="concat('admin.settings.settings-tab.settings-tab2', hide)">
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('danger'))
        <div wire:poll.3s="hide" class="alert alert-danger mb-0 mt-3" role="alert" :wire:key="concat('admin.settings.settings-tab.settings-tab2', hide)">
            {{ session('danger') }}
        </div>
    @endif

    <form wire:submit.prevent="updateCompanyDocuments">
        @csrf
        <div class="d-flex justify-content-start pt-3 gap-2">
            <button type="button" class="btn btn-outline-success shadow-sm" wire:click="addDocument">
                <i class="fa-solid fa-plus"></i> New
            </button>
        </div>

        <div class="pt-3">
            @if(!$documents)
                <div class="alert alert-danger">
                    No documents available
                </div>
            @else
                
                @foreach(array_reverse($documents, true) as $index => $document)
                    <div class="py-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fs-5 fw-bold bg-dark px-3 text-light rounded-5 shadow-sm">{{ $index + 1 }}</p>
                                    </div>
            
                                    <div>
                                        <button type="button" class="btn btn-outline-danger shadow-sm" wire:click.prevent="removeDocument({{$index}})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>    
                                </div>
                            </div>
            
                            <div class="card-body bg-light">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="document{{ $index }}" class="form-label fw-bold">Document Name</label>
                                        <input type="text" class="form-control @error('documents.'.$index.'.name') is-invalid @enderror"
                                            id="document{{ $index }}" placeholder="Document Name"
                                            wire:model.debounce.500ms="documents.{{ $index }}.name">
                                        @error('documents.'.$index.'.name') 
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
            
                                    <div class="col-md-6">
                                        <label for="documentInput{{ $index }}" class="form-label fw-bold">Document</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control @error('documents.'.$index.'.filename') is-invalid @enderror"
                                            id="documentInput{{ $index }}" placeholder="File"
                                            wire:model.debounce.500ms="documents.{{ $index }}.filename"
                                            
                                            accept=".pdf,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">

                                            @isset($document['filename'])
                                                <button class="btn btn-outline-secondary">
                                                    <i class="fa-solid fa-download"></i>
                                                </button>
                                            @endisset
                                        </div>
                                        @error('documents.'.$index.'.filename') 
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        {{-- {{ $document['filename'] }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="pt-3">
            <button type="submit" class="btn btn-outline-success shadow-sm">
                <i class="fa-solid fa-check"></i> Confirm
            </button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary shadow-sm">
                Cancel
            </a>
        </div>  
    </form> 
</div>

