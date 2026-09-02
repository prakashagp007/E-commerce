<!-- Top of file — -->
@php
    $categories = \App\Models\Category::all();
    $cartCount = auth()->check() ? \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity') : 0;
@endphp

<!-- Top Bar -->
<div class="top-bar text-center">
    🚚 Free Shipping on Orders Above ₹999
</div>

<!-- Header -->
<header class="shadow-sm bg-white sticky-top">

    <div class="container py-3">

        <div class="row align-items-center">

            <!-- Logo -->
            <div class="col-lg-2 col-md-3 col-6">
                <a href="#" class="logo">
                    GP Shoopie
                </a>
            </div>

            <!-- Search -->
            <div class="col-lg-6 d-none d-lg-block">
                <form class="search-box">
                    <input type="text" placeholder="Search products...">
                    <button type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <!-- Icons -->
            <div class="col-lg-4 col-md-9 col-6">

                <div class="header-icons">

                    <a href="#">
                        <i class="bi bi-heart"></i>
                        <span>Wishlist</span>
                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-danger">Login</a>
                    @endguest

                    @auth
                        {{-- <a href="{{ route('cart.index') }}" class="btn btn-outline-dark">My Cart</a> --}}

                        <a href="{{ route('cart.index') }}" class="btn btn-outline-dark position-relative">
                            My Cart
                            @if ($cartCount > 0)
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark">Logout</button>
                        </form>
                    @endauth



                </div>

            </div>

        </div>

    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                            @forelse($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.show', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @empty
                                <li>
                                    <span class="dropdown-item text-muted">
                                        No categories yet
                                    </span>
                                </li>
                            @endforelse
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">New Arrivals</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Best Sellers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Offers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

</header>
