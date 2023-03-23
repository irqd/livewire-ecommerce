<div>
    @if(session()->has('success'))
        <div wire:poll.3s="hide" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>Categories</h1>

    <div class="card shadow-sm">
        <div class="card-header py-3 bg-light">
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.categories.add') }}" class="btn btn-outline-success shadow-sm">
                    <i class="fa-solid fa-plus"></i> Add
                </a>
    
                <input type="text" class="form-control w-50 shadow-sm" placeholder="Search categories...">
            </div>
            
        </div>
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Laptops</td>
                        <td>laptops</td>
                        <td class="w-25">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        </td>
                        <td>
                            <img src="{{ asset('images/bag.svg')}}" alt="">
                        </td>
                        <td>
                            <div class="bg-success rounded px-2 py-1 text-center text-white">
                                <span>Available</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-outline-warning shadow-sm">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-outline-danger shadow-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">2</th>
                        <td>Mobile</td>
                        <td>mobile</td>
                        <td class="w-25">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        </td>
                        <td>
                            <img src="{{ asset('images/bag.svg')}}" alt="">
                        </td>
                        <td>
                            <div class="bg-danger rounded px-2 py-1 text-center text-white">
                                <span>Unavailable</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-outline-warning shadow-sm">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-outline-danger shadow-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>
