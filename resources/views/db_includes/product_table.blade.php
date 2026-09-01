<div class="row g-3">

    @forelse($data as $product)

        <div class="col-xl-3 col-lg-4 col-md-6">

            <div class="product-card">

                <div class="thumb">

                    <img src="{{ asset('uploads/products/'.$product->image) }}">

                    <span class="{{ $product->status ? 'active' : 'inactive' }}">
                        {{ $product->status ? 'Active' : 'Inactive' }}
                    </span>

                </div>

                <div class="content">

                    <h6>{{ $product->name }}</h6>

                    <small>{{ $product->slug }}</small>

                    <div class="details">

                        <span>₹{{ number_format($product->price) }}</span>

                        <span>Stock : {{ $product->qty }}</span>

                    </div>

                </div>

                <div class="actions">

                    <a href="{{ route('products.show',$product->id) }}">
                        <i class="bi bi-eye"></i>
                    </a>

                    <a href="{{ route('products.edit',$product->id) }}">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Delete Product?')">
                            <i class="bi bi-trash"></i>
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12 text-center py-5">
            No Products Found
        </div>

    @endforelse

</div>
