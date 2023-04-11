<div class="container-fluid container-lg">
    <div class="pt-5">
        <div class="fw-bold fs-3 pt-2">
            All Categories
        </div>

        <div class="w-100">
            <input type="text" 
            class="form-control shadow-sm" 
            placeholder="Search categories..."
            wire:model.debounce.500ms="search"
            :wire:key="concat('admin.categories', $search)">
        </div>
    </div>

    <div class="py-4">
        <div class="row px-2" id="all_category">
            @if($categories->isEmpty())
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        No categories found...
                    </div>
                </div>
                
            @endif

            @foreach($categories as $index => $category)
                <div class="col-6 col-md-4 col-lg-2 p-1">
                    <div class="card rounded shadow-sm">
                        <a href="{{ route('main.category', ['slug' => $category->slug, 'id' => $category->id ])}}">
                            <div class="img-wrapper-category rounded" id="category_image">
                                <img src="{{  asset('storage/'.$category->image )}}" alt="Category  {{  $category->name }}">
                            </div>
    
                            <div class="card-img-overlay">
                                <div class="overlay text-center bg-dark rounded-5">
                                    <small class="text-light">
                                        {{  $category->name }}
                                    </small>
                                </div>        
                            </div>
                        </a>      
                    </div>
                </div>
            @endforeach
        </>
    </div>
</div>
