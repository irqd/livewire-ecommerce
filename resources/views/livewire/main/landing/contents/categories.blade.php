<div class="container">
    <div class="rounded p-1 mt-3">
        <div class="d-flex justify-content-between">
            <div>
                <h1 class="p-2 px-auto fs-4 border-bottom border-dark">
                    Product Categories
                </h1>
            </div>

            <div>
                <h1 class="pt-3 px-auto fs-5">
                    <a href="{{ route('main.categories') }}" class="link-dark">See all...</a>
                </h1>
            </div>
        </div>
        
    </div>
    
    <div id="categoriesCarousel" class="carousel" data-bs-ride="carousel">
       <div class="carousel-inner">
            @foreach($categories as $index => $category)
                <div class="carousel-item @if($index == 0) active @endif">
                    <div class="card-wrapper">
                        <div class="card bg-light">
                            <a href="{{ route('main.category', ['slug' => $category->slug, 'id' => $category->id ])}}">
                                <div class="img-wrapper">
                                    <img src="{{ asset('storage/'.$category->image )}}" alt="Category Image {{ $index + 1 }}">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="overlay">
                                        <h6 class="card-title bg-dark text-light p-1 rounded-5 text-center">
                                            {{  $category->name }}
                                        </h6>
                                    </div>        
                                </div>
                            </a>                
                        </div>
                    </div>
                </div>
            @endforeach
       </div>

       <div class="">
            <button class="carousel-control-prev" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="prev">
            <span><i class="fa-solid fa-chevron-left"></i></span>
            <span class="visually-hidden">Previous</span>
            </button>
       </div>
       
       <div class="">
            <button class="carousel-control-next" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="next">
                <span><i class="fa-solid fa-chevron-right"></i></span>
            <span class="visually-hidden">Next</span>
            </button>
       </div>
       
    </div>
 </div>