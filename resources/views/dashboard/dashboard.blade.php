<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>e-commerce</title>

    {{-- css link --}}
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>
    <header class="navbar">

        <div class="logo">
            MyAdmin
        </div>

        <div class="menu-toggle" id="menuToggle">
            ☰
        </div>

        <nav id="navMenu">

            <button class="tab-btn active" data-tab="dashboard">
                All Products
            </button>

            <button class="tab-btn" data-tab="users">
                Add Product
            </button>

            <button class="tab-btn" data-tab="orders">
                Orders
            </button>

            <button class="tab-btn" data-tab="reports">
                Reports
            </button>

            <button class="tab-btn" data-tab="settings">
                Settings
            </button>

        </nav>

        <div class="profile">
            <span>🔔</span>
            <div class="avatar">A</div>
        </div>

    </header>


    <main class="container">

        <!-- Dashboard -->

        <section class="tab-content active" id="dashboard">

            <div class="box">

                <h3>All Products</h3>

                @include('db_includes.product_table')

            </div>

        </section>


        <!-- Users -->

        <section class="tab-content" id="users">

            <h2>Product</h2>

            <div class="box">

                @include('db_includes.add_product')

            </div>

        </section>


        <!-- Orders -->

        <section class="tab-content" id="orders">

            <h2>Orders</h2>

            <div class="box">

                <p>Your Orders Page</p>

            </div>

        </section>


        <!-- Reports -->

        <section class="tab-content" id="reports">

            <h2>Reports</h2>

            <div class="box">

                <p>Your Reports Page</p>

            </div>

        </section>


        <!-- Settings -->

        <section class="tab-content" id="settings">

            <h2>Settings</h2>

            <div class="box">

                <p>Your Settings Page</p>

            </div>

        </section>

    </main>


    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
