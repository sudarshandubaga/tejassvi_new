<div class="top-0 main-header">
    <header class="bg-white">
        <div class="container">
            <div class="header-part">
                <a href="{{ route('home') }}" title="{{ env('APP_NAME') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME') }} Logo"
                        title="{{ env('APP_NAME') }} Logo">
                </a>
                <form class="search-bar border">
                    <label for="search" class="bi bi-search"></label>
                    <input type="search" name="s" id="search" class="form-control border-0" autocomplete="off"
                        placeholder="Search">
                </form>


                <div class="d-flex align-items-center justify-content-between g-1 right-icons">
                    <div class="dropdown">
                        <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ₹ INR
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">USD</a></li>
                            <li><a class="dropdown-item" href="#">AUD</a></li>
                            <li><a class="dropdown-item" href="#">INR</a></li>
                        </ul>
                    </div>

                    <div>
                        <button type="button" class="btn btn-white">
                            <i class="bi bi-person"></i>
                            Login
                        </button>
                    </div>

                    <div>
                        <a href="{{ route('cart.index') }}" class="btn btn-white cart-btn">
                            <i class="bi bi-cart"></i> Cart - <small>(2 Items)</small>
                        </a>
                    </div>

                    <div class="d-block d-lg-none">
                        <button class="btn btn-dark text-white nav-toggle">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </header>
    <nav class="bg-primary">
        <div class="container">
            <ul class="main-navbar">
                <li><a href="">Home</a></li>
                <x-category-menu :categories="$categories" />
                {{-- <li><a href="">Decor</a></li>
                <li><a href="">Exclusive</a></li> --}}
                <li><a href="">Wholesale</a></li>
            </ul>
        </div>
    </nav>
</div>
