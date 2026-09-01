<div class="container py-5">

    <div class="row g-5 align-items-center">

        <!-- Product Image -->
        <div class="col-lg-6">

            <div class="product-image-box">

                <img src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid rounded-4 shadow-lg"
                    alt="{{ $product->name }}">

            </div>

        </div>

        <!-- Product Details -->
        <div class="col-lg-6">

            <span class="badge bg-success px-3 py-2 mb-3">
                @if ($product->status)
                    In Stock
                @else
                    Out of Stock
                @endif
            </span>

            <h1 class="fw-bold mb-3">
                {{ $product->name }}
            </h1>

            <div class="mb-3">
                ⭐⭐⭐⭐⭐
                <span class="text-muted">(4.8 Rating)</span>
            </div>

            <h2 class="text-warning fw-bold mb-4">
                ₹{{ number_format($product->price, 2) }}
            </h2>

            <p class="text-secondary">
                {{ $product->description }}
            </p>

            <hr>

            <div class="row mb-4">

                <div class="col-6">
                    <strong>Available</strong><br>
                    {{ $product->qty }} Items
                </div>

                <div class="col-6">
                    <strong>Delivery</strong><br>
                    Free Shipping
                </div>

            </div>

            <!-- Add To Cart -->

            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf

                <div class="d-flex align-items-center mb-3">

                    <button type="button" class="btn btn-outline-secondary" id="minus">-</button>

                    <input type="number" name="quantity" id="quantity" value="1" min="1"
                        max="{{ $product->qty }}" class="form-control text-center mx-2" style="width:70px;">

                    <button type="button" class="btn btn-outline-secondary" id="plus">+</button>

                </div>

                <button type="submit" class="btn btn-warning w-100">
                    Add to Cart
                </button>

            </form>

            <form method="POST" action="{{ route('checkout.buyNow', $product->id) }}">
                @csrf
                <input type="hidden" name="quantity" id="quantity_hidden" value="1">
                <button type="submit" class="btn btn-success mt-3 w-100">Buy Now</button>
            </form>





        </div>

    </div>

</div>


<script>
    let qty = document.getElementById('quantity');
    let qtyHidden = document.getElementById('quantity_hidden');

    document.getElementById('plus').onclick = function() {
        let val = parseInt(qty.value);
        if (val < {{ $product->qty }}) {
            qty.value = val + 1;
            qtyHidden.value = val + 1;
        }
    }

    document.getElementById('minus').onclick = function() {
        let val = parseInt(qty.value);
        if (val > 1) {
            qty.value = val - 1;
            qtyHidden.value = val - 1;
        }
    }
</script>

{{-- <script>
    let qty = document.getElementById('quantity');

    document.getElementById('plus').onclick = function() {
        if (parseInt(qty.value) < {{ $product->qty }}) {
            qty.value++;
        }
    }

    document.getElementById('minus').onclick = function() {
        if (parseInt(qty.value) > 1) {
            qty.value--;
        }
    }

    // check out

    // quantity change aana hidden field um update aaganum
    document.getElementById('plus').onclick = function() {
        let val = parseInt(qty.value);
        if (val < {{ $product->qty }}) {
            qty.value = val + 1;
            document.getElementById('quantity_hidden').value = val + 1;
        }
    }
    document.getElementById('minus').onclick = function() {
        let val = parseInt(qty.value);
        if (val > 1) {
            qty.value = val - 1;
            document.getElementById('quantity_hidden').value = val - 1;
        }
    }
</script> --}}
