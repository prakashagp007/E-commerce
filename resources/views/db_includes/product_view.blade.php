<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header">
                <h3>Product Details</h3>
            </div>

            <div class="card-body">

                <div class="text-center mb-4">

                    <img src="{{ asset('uploads/products/' . $product->image) }}" width="180" class="img-thumbnail">

                </div>

                <table class="table table-bordered">

                    <tr>
                        <th>Name</th>
                        <td>{{ $product->name }}</td>
                    </tr>

                    <tr>
                        <th>Slug</th>
                        <td>{{ $product->slug }}</td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td>₹ {{ $product->price }}</td>
                    </tr>

                    <tr>
                        <th>Quantity</th>
                        <td>{{ $product->qty }}</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>{{ $product->description }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if ($product->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>

                </table>

                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    Back
                </a>

            </div>

        </div>

    </div>

</body>

</html>
