<div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        @if ($product->images->count() > 0)
        <div id="productImageCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            @foreach ($product->images as $image)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                <img src="{{ asset('storage/' . $image->filename) }}" alt="Product Image" class="image-fluid fixed-size-sm">
              </div>
            @endforeach
            </div>
            
            @if($product->images->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            @endif
          </div>
        @else
            <img src="{{ asset('images/no-photo.svg')}}" alt="No Image" class="image-fluid fixed-size-sm">  
        @endif
      </div>
      <div class="col-md-6">
        <h2 class="mb-3">{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p><strong>Category:</strong> {{ $product->category->name }}</p>
        <p><strong>Availability:</strong> {{ $product->status ? 'In stock' : 'Out of stock' }}</p>
        <p><strong>Price:</strong> 
            <div class="d-flex justify-content-between">
            <h6 class="text-warning m-0 p-0">
                <span class="text-dark fs-5">P {{ $product->stocks->first()->selling_price }}
                </span>
            </h6>
            <small class="text-danger">
                <span class="text-dark">P</span>
                <s>{{ $product->stocks->first()->original_price }}</s>
            </small>
            </div>
        </p>
        <form {{-- action="{{ route('cart.add', $product->id) }}" method="POST" --}}>
          {{-- @csrf--}}
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="{{ $product->stocks->sum('quantity') }}">
          </div>
          <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
      </div>
    </div>
  </div>
  