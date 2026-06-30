<!DOCTYPE html>
<html>

<head>
    <title>My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>My Cart</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($cartItems->isEmpty())
            <p>Cart empty ah irukku.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>₹{{ $item->product->price }}</td>
                            <td>
                                <form method="POST" action="{{ route('cart.update', $item->id) }}" class="d-flex">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                        class="form-control" style="width:70px">
                                    <button class="btn btn-sm btn-secondary ms-1">Update</button>
                                </form>
                            </td>
                            <td>₹{{ $item->product->price * $item->quantity }}</td>
                            <td>
                                <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Total: ₹{{ $total }}</h4>
        @endif

        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
</body>

</html>
