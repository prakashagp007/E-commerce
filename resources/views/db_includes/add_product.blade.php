<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">

        <div class="card">

            <div class="card-header">
                <h3>Add Product</h3>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <label>Product Name</label>

                        <input type="text" name="name" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Price</label>

                        <input type="number" name="price" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Quantity</label>

                        <input type="number" name="qty" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Description</label>

                        <textarea name="description" class="form-control">
                    </textarea>

                    </div>

                    <div class="mb-3">

                        <label>Image</label>

                        <input type="file" name="image" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Status</label>

                        <select name="status" class="form-control">

                            <option value="1">
                                Active
                            </option>

                            <option value="0">
                                Inactive
                            </option>

                        </select>

                    </div>

                    <button class="btn btn-primary">

                        Save Product

                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
