<div class="box">
    <table>

        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($data as $product)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <img src="{{ asset('uploads/products/' . $product->image) }}" width="60" height="60"
                            style="border-radius:8px; object-fit:cover;">
                    </td>

                    <td>{{ $product->name }}</td>

                    <td>{{ $product->slug }}</td>

                    <td>₹ {{ $product->price }}</td>

                    <td>{{ $product->qty }}</td>

                    <td>
                        @if ($product->status)
                            <span class="badge text-bg-success active">Active</span>
                        @else
                            <span class="badge text-bg-secondary inactive">Inactive</span>
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            style="display:inline-block;">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Delete this product?')" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash3-fill"></i>
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8" style="text-align:center;">
                        No Products Found
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

</div>
