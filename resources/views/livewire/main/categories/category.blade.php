<div>
    <h1>
        <a href="{{ route('main.categories') }}" class="link-dark breadcrumbs">Categories</a> /
        <a href="" class="breadcrumbs link-secondary">{{ $category->name }}</a>
    </h1>

    <div class="row px-3 pt-3">
        @if(count($product_list) == 0)
            <div class="col">
                <div class="alert alert-danger">
                    No products found...
                </div>
            </div>
        @endif

        @foreach($product_list as $product)
            <div class="col-6 col-md-4 col-lg-2 p-1">
                <a id="product" href="#" class="text-decoration-none">
                    <div class="card bg-body shadow-sm">
                        <img src="{{ asset('storage/'.$product->images[0]->filename ) }}" class="card-img-top" alt="{{ $product->name }} image" height="160px">
                        <div class="card-body p-2 m-0">
                            <div class="card-text p-0 m-0 mb-1">
                                <h6 class="fw-bold link-dark pt-1">
                                    {{  $product->name }}
                                </h6>
                            </div>
                            
                            <h6 class="text-warning m-0 p-0">
                                <span class="text-dark fs-5">P {{ $product->stocks[0]->selling_price }}
                                </span>
                            </h6>
                            
                            <div class="d-flex justify-content-between">
                                <small class="text-danger">
                                    <span class="text-dark">P</span>
                                    <s>{{ $product->stocks[0]->original_price }}</s>
                                </small>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
