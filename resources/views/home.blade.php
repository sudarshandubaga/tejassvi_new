@extends('layouts.app')

@section('content')
    {{-- Section Slider --}}
    <section class="slider-section">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/sliders/17.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/sliders/16.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/sliders/11.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    {{-- Shipping Info --}}
    <section class="shipping-info-section bg-white py-5">
        <div class="container">
            <div class="row align-items-center g-3 text-center">
                <div class="col-xl-3 col-6">
                    <div>
                        <div class="freewship">
                            <b>WORLDWIDE DELIVERY</b>
                        </div>

                        <div class="fship">
                            Fast &amp; Free International Shipping
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="freewship">
                        <b>SAFE CHECKOUT</b>
                    </div>

                    <div class="fship">
                        100% Secure checkout process.
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div>
                        <div class="freewship">
                            <b>ASSURED HAPPINESS</b>
                        </div>

                        <div class="fship">
                            <div>Weekly giveaway/rewards Programms</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div>
                        <div class="freewship">
                            <b>GIFT WRAPPING</b>
                        </div>

                        <div class="fship">
                            <div>Perfectly wrapped gift for Loved one</div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row align-items-center g-3 text-center">
                <div class="col-xl-3 col-6">
                    <div class="row  align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/worlwide-delivery.webp') }}">
                        </div>

                        <div class="col-sm-8">
                            <div class="freewship">
                                <b>WORLDWIDE DELIVERY</b>
                            </div>

                            <div class="fship">
                                Fast &amp; Free International Shipping
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div class="row  align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/safe-checkout.webp') }}">
                        </div>

                        <div class="col-sm-8">
                            <div class="freewship">
                                <b>SAFE CHECKOUT</b>
                            </div>

                            <div class="fship">
                                100% Secure checkout process.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div class="row  align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/assured-happiness.webp') }}">
                        </div>

                        <div class="col-sm-8">
                            <div class="freewship">
                                <b>ASSURED HAPPINESS</b>
                            </div>

                            <div class="fship">
                                <div>Weekly giveaway/rewards Programms</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div class="row  align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/gift-wrapping.webp') }}">
                        </div>

                        <div class="col-sm-8">
                            <div class="freewship">
                                <b>GIFT WRAPPING</b>
                            </div>

                            <div class="fship">
                                <div>Perfectly wrapped gift for Loved one</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>


    {{-- Deals of The Day --}}
    <section class="todays-deals-section py-5 bg-light text-dark border-top border-bottom">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="home-title">Deals of The Day</h3>
                <a href="#" class="ms-3 btn btn-outline-primary btn-sm">
                    See all deals <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="light-slider">
                @for ($i = 1; $i <= 10; $i++)
                    <div class="bg-white border rounded overflow-hidden h-100">
                        <figure class="position-relative m-0">
                            <img src="{{ asset('images/product/10/medium_47.JPG') }}" alt=""
                                class="card-img-top rounded-bottom">

                            <small class="d-inline-block bg-danger text-white px-2 py-1 fw-bold rounded mb-1 discount-pill">
                                upto 70% off
                            </small>
                        </figure>
                        <div class="p-2">
                            <h5 class="m-0">
                                @if ($i != 2)
                                    Product {{ $i }}
                                @else
                                    Product {{ $i }}
                                    Product {{ $i }}
                                    Product {{ $i }}
                                    Product {{ $i }}
                                    Product {{ $i }}
                                    Product {{ $i }}
                                    Product {{ $i }}
                                @endif
                            </h5>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- Popular Products --}}
    <section class="popular-products-sections py-5">
        <div class="container">
            <h3 class="home-title mb-3">Popular Products</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, tempora commodi incidunt deserunt eos iusto
                unde voluptates natus, necessitatibus qui sed suscipit dolores molestias esse dolor eligendi. Laboriosam,
                aspernatur animi.</p>

            <div class="row g-3">
                <div class="col-lg-5">
                    <div class="h-100">
                        <img src="{{ asset('images/product/1/GALL_2.jpg') }}" alt=""
                            class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row g-3">
                        @foreach ($products as $product)
                            <div class="col-sm-4 col-lg-3 col-6">
                                <x-product-box :product="$product" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Categories --}}
    <section class="category-section py-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-sm-8 mx-auto text-center">

                    <h3 class="home-title mb-3 text-center">Shop by Categories</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur, fugit deserunt reiciendis
                        sint quis
                        itaque architecto facere quia, quae quas quaerat ipsum, eum deleniti repellendus? Deserunt eius quod
                        magni
                        quasi.</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-sm-2 col-6">
                    <div class="rounded bg-primary overflow-hidden shadow">
                        <img src="{{ asset('images/product/medium_70.png') }}" alt="" class="img-fluid rounded">
                        <h4 class="text-center text-white mb-0 py-2">Furniture</h4>
                    </div>
                </div>

                <div class="col-sm-2 col-6">
                    <div class="rounded bg-primary overflow-hidden shadow">
                        <img src="{{ asset('images/product/medium_62.png') }}" alt="" class="img-fluid rounded">
                        <h4 class="text-center text-white mb-0 py-2">Decor</h4>
                    </div>
                </div>

                <div class="col-sm-2 col-6">
                    <div class="rounded bg-primary overflow-hidden shadow">
                        <img src="{{ asset('images/product/medium_23.jpg') }}" alt="" class="img-fluid rounded">
                        <h4 class="text-center text-white mb-0 py-2">Exlusive</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="6000">
                    <img src="https://www.shutterstock.com/image-vector/web-banner-christmas-sale-holiday-260nw-1556756354.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="6000">
                    <img src="https://www.shutterstock.com/image-vector/web-banner-christmas-sale-holiday-260nw-1556756354.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="6000">
                    <img src="https://www.shutterstock.com/image-vector/web-banner-christmas-sale-holiday-260nw-1556756354.jpg"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container">
            <div class="row text-center g-3 align-items-center">
                <div class="col-xl-3 col-6">
                    <div class="row align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/organic-sustainable.webp') }}">
                        </div>

                        <div class="col-sm-8">
                            <div class="freewship">
                                <b>Organic + Sustainable</b>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div class="row  align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/aesthetic-design.webp') }}">
                        </div>

                        <div class="col-sm-8">
                            <div class="freewship">
                                <b>Aesthetic Design</b>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div class="row  align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/unique-and-trendy.webp') }}">
                        </div>

                        <div class="col-sm-8">
                            <div class="freewship">
                                <b>Unique &amp; Trendy</b>
                            </div>

                            <div class="fship">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-6">
                    <div class="row  align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/affordable-prices.webp') }}">
                        </div>

                        <div class="col-sm-8">
                            <div class="freewship">
                                <b>Affordable Prices</b>
                            </div>

                            <div class="fship">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="popular-searches-section py-5">
        <div class="container">
            <h3 class="home-title mb-3">
                Popular Searches
            </h3>
            <div class="text-center">
                <a href="#">Christmas Decoration Items</a>
                <a href="#">Christmas Gifts</a>
                <a href="#">Scented Candles</a>
                <a href="#">Wall Clocks</a>
                <a href="#">Pendulum Clocks</a>
                <a href="#">Ganesha Water Fountains</a>
                <a href="#">Ganesha Paintings</a>
                <a href="#">Buddha Water Fountains</a>
                <a href="#">Buddha Paintings</a>
                <a href="#">Buddha Idols</a>
                <a href="#">Key Holders</a>
                <a href="#">Brass Diyas</a>

                <a href="#">Christmas Decoration Items</a>
                <a href="#">Christmas Gifts</a>
                <a href="#">Scented Candles</a>
                <a href="#">Wall Clocks</a>
                <a href="#">Pendulum Clocks</a>
                <a href="#">Ganesha Water Fountains</a>
                <a href="#">Ganesha Paintings</a>
                <a href="#">Buddha Water Fountains</a>
                <a href="#">Buddha Paintings</a>
                <a href="#">Buddha Idols</a>
                <a href="#">Key Holders</a>
                <a href="#">Brass Diyas</a>

                <a href="#">Christmas Decoration Items</a>
                <a href="#">Christmas Gifts</a>
                <a href="#">Scented Candles</a>
                <a href="#">Wall Clocks</a>
                <a href="#">Pendulum Clocks</a>
                <a href="#">Ganesha Water Fountains</a>
                <a href="#">Ganesha Paintings</a>
                <a href="#">Buddha Water Fountains</a>
                <a href="#">Buddha Paintings</a>
                <a href="#">Buddha Idols</a>
                <a href="#">Key Holders</a>
                <a href="#">Brass Diyas</a>
            </div>
        </div>
    </section>

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection
