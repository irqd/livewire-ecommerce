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
                        @foreach ($categories as $category)
                        <tr>
                           
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td class="w-25">
                                <p>{{ $category->description }}</p>
                            </td>
                            <td>
                                @if ($category->image)
                                <img src="{{ asset('images/uploads/category/'.$category->image)}}" style="max-height: 248px; max-width:248px;"class="image-fluid">
                                    
                                @else
                                <img src="{{ asset('images/bag.svg')}}" alt="" class="image-fluid">
                                    
                                @endif
                            </td>
                            <td>
                                <div class="bg-success rounded px-2 py-1 text-center text-white">
                                    <span> {{ $category->status == '1' ? 'Active':'Inactive'}}</span>
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

                        
                        
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>