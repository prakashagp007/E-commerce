{{-- resources/views/checkout/success.blade.php --}}
<!DOCTYPE html>
<html>

<head>
    <title>Order Placed!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 text-center">
        <div class="card shadow p-5 mx-auto" style="max-width:500px;">
            <h1>✅</h1>
            <h3 class="text-success">Order Placed Successfully!</h3>
            <p>Order ID: <strong>#{{ $order->id }}</strong></p>
            <p>Payment: <span class="badge bg-info">{{ strtoupper($order->payment_method) }}</span></p>
            <p>Status: <span class="badge bg-warning">{{ ucfirst($order->order_status) }}</span></p>
            <hr>
            @foreach ($order->items as $item)
                <div class="d-flex justify-content-between">
                    <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                    <span>₹{{ number_format($item->price * $item->quantity, 2) }}</span>
                </div>
            @endforeach
            <hr>
            <h5>Total: ₹{{ number_format($order->total_amount, 2) }}</h5>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3">Continue Shopping</a>
        </div>
    </div>
</body>

</html>
