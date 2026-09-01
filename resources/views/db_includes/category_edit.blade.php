{{-- resources/views/db_includes/category_edit.blade.php --}}
<div class="container mt-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header"><strong>Edit Category</strong></div>
            <div class="card-body">
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $category->name) }}" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Update</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
