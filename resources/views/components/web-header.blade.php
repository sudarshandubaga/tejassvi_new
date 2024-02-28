<div class="position-sticky top-0 main-header">
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

                <div class="ms-1">
                    <button type="button" class="btn btn-white">
                        <i class="bi bi-person"></i>
                        Login
                    </button>
                </div>

                <div class="ms-1">
                    <button type="button" class="btn btn-white cart-btn">
                        <i class="bi bi-cart"></i> Cart - <small>(2 Items)</small>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <nav class="bg-primary">
        <div class="container">
            <ul class="main-navbar">
                <li><a href="">Home</a></li>
                <li class="has-dropdown">
                    <a href="">Furniture <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @for($i = 1; $i <= 4; $i++)
                        <li>
                            <a href="{{ route('product.index', ['category' => 'category-' . $i]) }}">Category {{ $i }}</a>

                            <ul>
                                @for($j = 1; $j <= 5; $j++)
                                <li>
                                    <a href="">Sub Category {{ $i }}.{{ $j }}</a>
                                </li>
                                @endfor
                            </ul>
                        </li>
                        @endfor
                    </ul>
                </li>
                <li><a href="">Decor</a></li>
                <li><a href="">Exclusive</a></li>
                <li><a href="">Wholesale</a></li>
            </ul>
        </div>
    </nav>
</div>
