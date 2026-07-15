{{-- resources/views/checkout/index.blade.php --}}
<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Checkout</h2>

        <form method="POST" action="{{ route('checkout.place') }}">
            @csrf
            <div class="row">

                {{-- Left: Delivery Address --}}
                <div class="col-md-7">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Delivery Address</strong></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', Auth::user()->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="2" required>{{ old('address') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control"
                                        value="{{ old('city') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pincode</label>
                                    <input type="text" name="pincode" class="form-control"
                                        value="{{ old('pincode') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Method --}}
                    <div class="card mb-4">
                        <div class="card-header"><strong>Payment Method</strong></div>
                        <div class="card-body">

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod"
                                    value="cod" checked onchange="togglePayment(this.value)">
                                <label class="form-check-label" for="cod">
                                    💵 Cash on Delivery (COD)
                                </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="upi"
                                    value="upi" onchange="togglePayment(this.value)">
                                <label class="form-check-label" for="upi">
                                    📱 UPI Payment
                                </label>
                            </div>

                            {{-- UPI Section --}}
                            <div id="upi_section" style="display:none;" class="border rounded p-3 mt-3">
                                <p class="fw-bold text-center">Scan & Pay</p>
                                {{-- Unga UPI QR code image path kuduthunga --}}
                                <div class="text-center mb-3">
                                    <img src="{{ asset('images/upi_qr.png') }}" alt="UPI QR Code"
                                        style="width:200px; height:200px; border:2px solid #dee2e6; border-radius:8px;">
                                </div>
                                <p class="text-center text-muted small">UPI ID: <strong>yourname@upi</strong></p>
                                <div class="mb-2">
                                    <label>UPI Transaction ID</label>
                                    <input type="text" name="upi_transaction_id" class="form-control"
                                        placeholder="UTR/Transaction ID enter pannunga">
                                    <small class="text-muted">Payment app la transaction ID paathu enter
                                        pannunga</small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Right: Order Summary --}}
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"><strong>Order Summary</strong></div>
                        <div class="card-body">
                            @foreach ($cartItems as $item)
                                <div class="d-flex justify-content-between mb-2">
                                    <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                                    <span>₹{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                                </div>
                            @endforeach
                            <hr>
                            <div class="d-flex justify-content-between">
                                <strong>Total</strong>
                                <strong class="text-success">₹{{ number_format($total, 2) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between text-muted small">
                                <span>Delivery</span>
                                <span>Free</span>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-warning w-100 fw-bold">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif

    </div>

    <script>
        function togglePayment(val) {
            document.getElementById('upi_section').style.display = val === 'upi' ? 'block' : 'none';
        }
    </script>
</body>

</html>
