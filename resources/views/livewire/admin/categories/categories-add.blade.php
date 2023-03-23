<div>
    @if(session()->has('success'))
        <div wire:poll.3s="hide" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>Categories / Add</h1>

    <div class="card shadow-sm">
        <div class="card-header py-3 bg-dark">
            <h3 class="m-0 font-weight-bold text-light">New Category</h3>
        </div>
        <div class="card-body bg-light">
            <form class="row g-3 justify-content">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label fw-bold">Category Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Category Name">
                </div>
                <div class="col-md-6">
                    <label for="slug" class="form-label fw-bold">Slug</label>
                    <input type="text" class="form-control" id="slug" placeholder="Slug">
                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="2" placeholder="Description"></textarea>
                </div>

                <div class="col-md-6">
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input class="form-control" type="file" id="image">     
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label fw-bold" >
                        Status
                    </label>
                    <select name="status" id="status" class="form-select" aria-placeholder="Select Status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                
                <div>
                    <hr>
                </div>

                <h4 class="my-0 pb-2">SEO Tags</h4>

                <div class="col-md-12 my-0">
                    <label for="meta_name" class="form-label fw-bold">Meta Name</label>
                    <input type="text" class="form-control" id="meta_name" placeholder="Meta Name">
                </div>

                <div class="col-md-12">
                    <label for="meta_keyword" class="form-label fw-bold">Meta Keyword</label>
                    <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="2" placeholder="Meta Keyword"></textarea>
                </div>

                <div class="col-md-12">
                    <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                    <textarea class="form-control" name="meta_description" id="meta_description" rows="2" placeholder="Meta Description"></textarea>
                </div>

                <div class="col-md-12 pt-3">
                    <button type="submit" class="btn btn-outline-success shadow-sm">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>
                    <a href="{{ route('admin.categories') }}" class="btn btn-outline-secondary shadow-sm">
                        Cancel
                    </a>
                </div>
            </form> 
        </div>
    </div>
</div>
