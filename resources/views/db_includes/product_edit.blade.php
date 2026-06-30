<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}">
    </div>

    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="qty" class="form-control" value="{{ $product->qty }}">
    </div>

    <div class="mb-3">
        <label>Description</label>

        <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>

    </div>

    <div class="mb-3">

        <label>Current Image</label><br>

        <img src="{{ asset('uploads/products/' . $product->image) }}" width="120">

    </div>

    <div class="mb-3">

        <label>New Image</label>

        <input type="file" name="image" class="form-control">

    </div>

    <div class="mb-3">

        <label>Status</label>

        <select name="status" class="form-control">

            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>
                Inactive
            </option>

        </select>

    </div>

    <button class="btn btn-primary">
        Update Product
    </button>

</form>
