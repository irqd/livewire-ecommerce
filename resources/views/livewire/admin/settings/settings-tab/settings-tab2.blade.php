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
    
    <div class="g-3 pt-3">
        <div class="card shadow-sm">
            <div class="card-header py-3 bg-light">
                <livewire:admin.settings.settings-tab.settings-tab2-modals.settings-tab2-add-modal/>

                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-success shadow-sm" data-bs-toggle="modal" data-bs-target="#addDocumentModal">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>
                </div>
    
            </div>
            <div class="card-body bg-light">
                <div class="row pt-2 d-flex gy-3">
                    @if(count($company_profile->documents) == 0)
                        <div class="col">
                            <div class="alert alert-danger">
                                No documents found.
                            </div>
                        </div>
                    @endif

                    @foreach($company_profile->documents as $document)
                        <div class="col-lg-4">
                            <livewire:admin.settings.settings-tab.settings-tab2-modals.settings-tab2-edit-modal :editDocument="$document" key="{{  now() }}"/>
                            <livewire:admin.settings.settings-tab.settings-tab2-modals.settings-tab2-delete-modal :deleteDocument="$document" key="{{  now() }}"/>
                            <div class="card shadow-sm py-1 bg-light">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h1 class="m-0 fs-5 fw-bold pt-1">
                                                @php
                                                    $file_extension = pathinfo($document->filename, PATHINFO_EXTENSION); 
                                                    $isWordFile = ($file_extension == "doc" || $file_extension == "docx") ? true : false;
                                                    $isPDFFile = ($file_extension == "pdf") ? true : false;
                                                @endphp
                                                <i @class([
                                                    'fa-solid',
                                                    'fa-file-word text-primary' => $isWordFile,
                                                    'fa-file-pdf text-danger' => $isPDFFile,
                                                    'fa-file text-secondary' => !$isWordFile and !$isPDFFile,
                                                ])></i>

                                                {{ $document->name }}
                                            </h1>
                                        </div>
    
                                        <div>
                                            <button type="button" class="btn btn-sm btn-outline-info shadow-sm" wire:click.prevent="downloadFile({{$document->id}})">
                                                <i class="fa-solid fa-download"></i>
                                            </button>

                                            <button class="btn btn-sm btn-outline-warning shadow-sm" data-bs-toggle="modal" data-bs-target="#editDocument-{{ $document->id }}">
                                                <i class="fa-solid fa-edit"></i>
                                            </button>

                                            <button class="btn btn-sm btn-outline-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteDocument-{{ $document->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

