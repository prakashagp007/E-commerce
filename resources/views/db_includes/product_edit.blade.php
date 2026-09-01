    <style>
        /* ================================
       Product Form - Main Container
    ================================= */

        .product-form-wrapper {
            width: 100%;
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 15px;
        }

        .product-form-card {
            background: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.07);
        }


        /* ================================
       Form Header
    ================================= */

        .product-form-header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eeeeee;
        }

        .product-form-header h3 {
            margin: 0;
            font-size: 25px;
            font-weight: 700;
            color: #212529;
        }

        .product-form-header p {
            margin: 6px 0 0;
            color: #6c757d;
            font-size: 14px;
        }


        /* ================================
       Form Groups
    ================================= */

        .product-form-group {
            margin-bottom: 22px;
        }

        .product-form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #343a40;
        }


        /* ================================
       Inputs
    ================================= */

        .product-form-group .form-control,
        .product-form-group .form-select {
            width: 100%;
            min-height: 48px;
            padding: 11px 14px;
            border: 1px solid #dfe3e8;
            border-radius: 10px;
            background: #fafbfc;
            color: #212529;
            font-size: 14px;
            transition: all 0.25s ease;
            box-shadow: none;
        }

        .product-form-group textarea.form-control {
            min-height: 130px;
            resize: vertical;
        }

        .product-form-group .form-control:hover,
        .product-form-group .form-select:hover {
            border-color: #b8c1cc;
            background: #ffffff;
        }

        .product-form-group .form-control:focus,
        .product-form-group .form-select:focus {
            background: #ffffff;
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.10);
            outline: none;
        }


        /* ================================
       Two Column Fields
    ================================= */

        .product-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }


        /* ================================
       Image Section
    ================================= */

        .product-image-box {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 18px;
            background: #f8f9fc;
            border: 1px solid #e7e9ef;
            border-radius: 14px;
        }

        .product-image-preview {
            width: 130px;
            height: 130px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
        }

        .product-image-preview img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 8px;
        }


        /* ================================
       File Input
    ================================= */

        .product-form-group input[type="file"] {
            padding: 10px;
            cursor: pointer;
            background: #ffffff;
        }

        .product-form-group input[type="file"]::file-selector-button {
            margin-right: 12px;
            padding: 7px 14px;
            border: 0;
            border-radius: 7px;
            background: #6366f1;
            color: #ffffff;
            font-size: 13px;
            cursor: pointer;
            transition: 0.2s;
        }

        .product-form-group input[type="file"]::file-selector-button:hover {
            background: #4f46e5;
        }


        /* ================================
       Buttons
    ================================= */

        .product-form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eeeeee;
        }

        .product-update-btn {
            min-width: 160px;
            padding: 12px 22px;
            border: 0;
            border-radius: 10px;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.20);
        }

        .product-update-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.30);
        }

        .product-update-btn:active {
            transform: translateY(0);
        }


        /* ================================
       Responsive - Tablet
    ================================= */

        @media (max-width: 768px) {

            .product-form-wrapper {
                margin: 25px auto;
            }

            .product-form-card {
                padding: 25px;
                border-radius: 16px;
            }

            .product-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .product-image-box {
                flex-direction: column;
                align-items: flex-start;
            }

            .product-image-preview {
                width: 150px;
                height: 150px;
            }
        }


        /* ================================
       Responsive - Mobile
    ================================= */

        @media (max-width: 480px) {

            .product-form-wrapper {
                padding: 0 10px;
                margin: 15px auto;
            }

            .product-form-card {
                padding: 20px 16px;
                border-radius: 14px;
            }

            .product-form-header {
                margin-bottom: 22px;
            }

            .product-form-header h3 {
                font-size: 21px;
            }

            .product-form-group {
                margin-bottom: 18px;
            }

            .product-form-group .form-control,
            .product-form-group .form-select {
                min-height: 46px;
            }

            .product-form-actions {
                flex-direction: column;
            }

            .product-update-btn {
                width: 100%;
            }

            .product-image-box {
                padding: 14px;
            }

            .product-image-preview {
                width: 120px;
                height: 120px;
            }
        }
    </style>

    <div class="product-form-wrapper">

        <div class="product-form-card">

            <div class="product-form-header">
                <h3>Edit Product</h3>
                <p>Update your product details and save the changes.</p>
            </div>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="product-form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}"
                        placeholder="Enter product name">
                </div>


                <div class="product-form-group">
                    <label>Category</label>

                    <select name="category_id" class="form-select" required>

                        <option value="">-- Select Category --</option>

                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach

                    </select>
                </div>


                <div class="product-row">

                    <div class="product-form-group">
                        <label>Price</label>

                        <input type="number" name="price" class="form-control" value="{{ $product->price }}"
                            placeholder="Enter price">
                    </div>


                    <div class="product-form-group">
                        <label>Quantity</label>

                        <input type="number" name="qty" class="form-control" value="{{ $product->qty }}"
                            placeholder="Enter quantity">
                    </div>

                </div>


                <div class="product-form-group">
                    <label>Description</label>

                    <textarea name="description" class="form-control" rows="5" placeholder="Enter product description">{{ $product->description }}</textarea>
                </div>


                <div class="product-form-group">

                    <label>Current Image</label>

                    <div class="product-image-box">

                        <div class="product-image-preview">

                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}">

                        </div>

                        <div>
                            <strong>Current Product Image</strong>

                            <p class="text-muted mb-0 mt-1">
                                Upload a new image below if you want to replace it.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="product-form-group">

                    <label>New Image</label>

                    <input type="file" name="image" class="form-control" accept="image/*">

                </div>


                <div class="product-form-group">

                    <label>Status</label>

                    <select name="status" class="form-select">

                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>


                <div class="product-form-actions">

                    <button type="submit" class="product-update-btn">
                        Update Product
                    </button>

                </div>

            </form>

        </div>

    </div>
