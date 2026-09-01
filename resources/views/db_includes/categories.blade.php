<div class="container mt-4">
    <div class="row">

        {{-- Add Category Form --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><strong>Add Category</strong></div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Category Name</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="eg: Electronics, Clothing..." required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Add Category</button>
                    </form>

                </div>
            </div>
        </div>

        {{-- Categories List --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>All Categories</strong></div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Products</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $cat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td><span class="badge bg-secondary">{{ $cat->slug }}</span></td>
                                    <td><span class="badge bg-info">{{ $cat->products_count }}</span></td>
                                    <td>
                                        <a href="{{ route('categories.edit', $cat->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        <form method="POST" action="{{ route('categories.destroy', $cat->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete pannalama?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        Category illa - add pannunga
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
