{{-- layouts.header la $categories venum, so pass pannanum --}}
@php $categories = \App\Models\Category::all(); @endphp


<div class="container py-5">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $category->name }}</li>
        </ol>
    </nav>

    <h3 class="mb-4">📂 {{ $category->name }}</h3>

    @if ($products->isEmpty())
        <div class="alert alert-info">
            No products found in <strong>{{ $category->name }}</strong>.
        </div>
    @else
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top"
                            style="height:200px; object-fit:cover;">
                        <div class="card-body">
                            <h6 class="card-title fw-semibold">{{ $product->name }}</h6>
                            <p class="text-warning fw-bold mb-2">
                                ₹{{ number_format($product->price, 2) }}
                            </p>
                            <a href="{{ route('product.single', $product->slug) }}"
                                class="btn btn-sm btn-outline-warning w-100">
                                View Product
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
