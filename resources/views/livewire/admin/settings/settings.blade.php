<div>
    <h1>
        <a href="{{ route('admin.settings') }}" class="link-dark breadcrumbs">Settings</a>
    </h1>

    <div class="card shadow-sm">
        <div class="card-header py-3 bg-dark">
            <h3 class="m-0 font-weight-bold text-light">System Settings</h3>
        </div>
        <div class="card-body bg-light">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link @if($tab == 'company_profile') active bg-dark text-light link-light @else link-dark @endif" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-product" type="button" role="tab" aria-controls="nav-product" aria-selected="@if($tab == 'company_profile') true @else false @endif" wire:click="$set('tab', 'company_profile')">Company</button>
                    <button class="nav-link @if($tab == 'documents') active bg-dark text-light link-light @else link-dark @endif" id="nav-stocks-tab" data-bs-toggle="tab" data-bs-target="#nav-stocks" type="button" role="tab" aria-controls="nav-stocks" aria-selected="@if($tab == 'documents') true @else false @endif" wire:click="$set('tab', 'documents')">Documents</button>
                    <button class="nav-link @if($tab == 'account') active bg-dark text-light link-light @else link-dark @endif" id="nav-images-tab" data-bs-toggle="tab" data-bs-target="#nav-images" type="button" role="tab" aria-controls="nav-images" aria-selected="@if($tab == 'account') true @else false @endif" wire:click="$set('tab', 'account')">Account</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade @if($tab == 'company_profile') show active @endif" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab" tabindex="0">
                    <livewire:admin.settings.settings-tab.settings-tab1 />                  
                </div>

                <div class="tab-pane fade @if($tab == 'documents') show active @endif" id="nav-stocks" role="tabpanel" aria-labelledby="nav-stocks-tab" tabindex="0">
                    <livewire:admin.settings.settings-tab.settings-tab2 /> 
                </div>  

                <div class="tab-pane fade @if($tab == 'account') show active @endif" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab" tabindex="0">
                    <livewire:admin.settings.settings-tab.settings-tab3 /> 
                </div>
            </div>
        </div>
    </div>
</div>


