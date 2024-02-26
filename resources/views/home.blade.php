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

    {{-- Deals of The Day --}}
    <section class="todays-deals-section py-5 bg-dark text-white">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="home-title">Deals of The Day</h3>
                <a href="#" class="ms-3 btn btn-outline-primary btn-sm">
                    See all deals <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="light-slider">
                @for ($i = 1; $i <= 10; $i++)
                    <div class="bg-primary rounded overflow-hidden">
                        <img src="{{ asset('images/product/10/medium_47.JPG') }}" alt=""
                            class="card-img-top rounded-bottom">
                        <div class="p-2">
                            <small class="d-inline-block bg-danger text-white px-2 py-1 fw-bold rounded mb-1">upto 70%
                                off</small>
                            <h5>
                                Product {{ $i }}
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

            <div class="row">
                <div class="col-lg-5">
                    <div class="h-100">
                        <img src="{{ asset('images/product/1/GALL_2.jpg') }}" alt=""
                            class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row g-3">
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="col-sm-4">
                                <div class="bg-white shadow rounded overflow-hidden border">
                                    <div>
                                        <img src="{{ asset('images/product/1/GALL_3.jpg') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="p-3">
                                        <h5 class="text-primary">
                                            Product {{ $i }}
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <del class="text-secondary">
                                                <span class="currency">₹</span> {{ number_format(5999, 2) }}
                                            </del>
                                            <div class="ms-2 fs-4">
                                                <span class="currency">₹</span> {{ number_format(4599, 2) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Shipping Info --}}
    <section class="shipping-info-section bg-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-6">
                    <div class="row  align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/Shipping.png') }}">
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
                            <img src="{{ asset('images/Safety.png') }}">
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
                            <img src="{{ asset('images/Happiness.png') }}">
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
                            <img src="{{ asset('images/Gift.png') }}">
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
            <div class="row justify-content-center">
                <div class="col-sm-2">
                    <div class="rounded bg-primary overflow-hidden shadow">
                        <img src="{{ asset('images/product/medium_70.png') }}" alt="" class="img-fluid rounded">
                        <h4 class="text-center text-white mb-0 py-2">Furniture</h4>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="rounded bg-primary overflow-hidden shadow">
                        <img src="{{ asset('images/product/medium_62.png') }}" alt="" class="img-fluid rounded">
                        <h4 class="text-center text-white mb-0 py-2">Decor</h4>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="rounded bg-primary overflow-hidden shadow">
                        <img src="{{ asset('images/product/medium_23.jpg') }}" alt="" class="img-fluid rounded">
                        <h4 class="text-center text-white mb-0 py-2">Exlusive</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-6">
                    <div class="row  align-items-center">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/Organic_Sustainable.png') }}">
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
                            <img src="{{ asset('images/Aesthetic_Design.png') }}">
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
                            <img src="{{ asset('images/Unique_Trendy.png') }}">
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
                            <img src="{{ asset('images/Affordable_Prices.png') }}">
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
