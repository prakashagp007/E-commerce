<div class="container mt-4" id="productcards">

    <h2 class="text-secondary text-center"> Our Products</h2>

    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @forelse($data as $product)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">

                <div class="product-card">

                    <div class="product-image">

                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}">

                        @if ($product->status)
                            <span class="status in-stock">In Stock</span>
                        @else
                            <span class="status out-stock">Out of Stock</span>
                        @endif

                    </div>

                    <div class="product-body">

                        <h5>{{ $product->name }}</h5>

                        <div class="price">
                            ₹{{ number_format($product->price, 2) }}
                        </div>

                        <div class="product-meta">

                            <span>
                                <i class="bi bi-box-seam"></i>
                                Qty : {{ $product->qty }}
                            </span>

                        </div>

                        <form method="POST" action="{{ route('cart.add', $product->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-warning">Add to Cart</button>
                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning text-center">
                    No Products Found
                </div>

            </div>
        @endforelse

    </div>

</div>
