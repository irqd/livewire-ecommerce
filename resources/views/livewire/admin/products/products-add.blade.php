<div>
    <h1>Products / Add</h1>

    <div class="card shadow-sm">
        <div class="card-header py-3 bg-dark">
            <h3 class="m-0 font-weight-bold text-light">New Product</h3>
        </div>
        <div class="card-body bg-light">
            @if(session()->has('success'))
                <div wire:poll.3s="hide" class="alert alert-success" role="alert" :wire:key="concat('admin.products-add', hide)">
                    {{ session('success') }}
                </div>
            @endif
           
            @if(session()->has('danger'))
                <div wire:poll.3s="hide" class="alert alert-danger" role="alert" :wire:key="concat('admin.products-add', hide)">
                    {{ session('danger') }}
                </div>
            @endif
            
            <form wire:submit.prevent="createProduct">
                @csrf
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link @if($tab == 'products') active bg-dark text-light link-light @else link-dark @endif" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-product" type="button" role="tab" aria-controls="nav-product" aria-selected="@if($tab == 'products') true @else false @endif" wire:click="$set('tab', 'products')">Product</button>
                      <button class="nav-link @if($tab == 'stocks') active bg-dark text-light link-light @else link-dark @endif" id="nav-stocks-tab" data-bs-toggle="tab" data-bs-target="#nav-stocks" type="button" role="tab" aria-controls="nav-stocks" aria-selected="@if($tab == 'stocks') true @else false @endif" wire:click="$set('tab', 'stocks')">Stocks</button>
                      <button class="nav-link @if($tab == 'images') active bg-dark text-light link-light @else link-dark @endif" id="nav-images-tab" data-bs-toggle="tab" data-bs-target="#nav-images" type="button" role="tab" aria-controls="nav-images" aria-selected="@if($tab == 'images') true @else false @endif" wire:click="$set('tab', 'images')">Images</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade @if($tab == 'products') show active @endif" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab" tabindex="0">
                        <livewire:admin.products.products-add-tabs.products-add-tab1 />
                    </div>

                    <div class="tab-pane fade @if($tab == 'stocks') show active @endif" id="nav-stocks" role="tabpanel" aria-labelledby="nav-stocks-tab" tabindex="0">
                        <livewire:admin.products.products-add-tabs.products-add-tab2 />
                    </div>

                    <div class="tab-pane fade @if($tab == 'images') show active @endif" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab" tabindex="0">
                        <livewire:admin.products.products-add-tabs.products-add-tab3 />
                    </div>
                </div>

                <div class="col-md-12 pt-3">
                    <button type="submit" class="btn btn-outline-success shadow-sm">
                        <i class="fa-solid fa-check"></i> Confirm
                    </button>
                    <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary shadow-sm">
                        Cancel
                    </a>
                </div>
            </form> 
        </div>
    </div>
</div>

