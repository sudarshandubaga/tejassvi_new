@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="main">
                <div class="breadcrumbs mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {!! $product->breadcrumbs !!}
                        </ol>
                    </nav>
                </div>
                <div class="row d-flex align aitems-center">
                    <div class="col-md-6 col-sm-12">
                        <div class="demo">
                            <ul id="productImageSlider">
                                @foreach ($product->product_images as $thumb => $full)
                                    <li data-thumb="{{ $thumb }}">
                                        <a href="{{ $full }}" data-toggle="lightbox" data-gallery="product">
                                            <img src="{{ $full }}" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Slider Start -->
                        {{-- <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    --}}

                        <!-- Slider End -->
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="titleDiv mb-4">
                            <h1>{{ $product->name }}</h1>
                        </div>
                        {{-- <hr>
                        <div class="row d-flex mb-4 mt-4 align-items-center">
                            <div class="col">
                                <div class=" d-flex">
                                    <div class="">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div class=" ms-3 star-rating">
                                        4.8/2 Rating
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-bulk-dark btn-block">Bulk Enquiry</button>
                            </div>
                        </div> --}}
                        {{-- <hr>
                        <div class="row mb-3">
                            <div class="col f-16">Wishlist</div>
                            <div class="col f-16">
                                <a class="addWishList" href="#">
                                    <i class="bi bi-eye-fill"></i>
                                    Add to Wish list
                                </a>
                            </div>
                        </div> --}}
                        {{-- <hr>
                        <div class="mb-3 f-16">2 Reviews | Viewed: 2.6K </div> --}}
                        {{-- <hr>
                            <div class="mb-3 f-16"> EMI starts at Rs 511.78/month
                                <a class="f-16 viewPlan" href="#">View Plans</a>
                            </div> --}}
                        @if (!empty($product->prices))
                            <hr>
                            <div class="d-flex align-items-center gap-2 size-group">
                                <div>
                                    Size:
                                </div>
                                @foreach ($product->prices as $key => $price)
                                    <label>
                                        <input type="radio" name="size" value="{{ $price->id }}"
                                            @if ($key === 0) checked @endif>
                                        <div class="size">
                                            {{ $price->size }}
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                            <hr>
                            <div class="d-flex gap-3 align-items-center mb-3">
                                <del class="text-gray" style="font-size: 18px;">
                                    ₹
                                    {{ number_format($product->prices[0]->price) }}
                                </del>
                                <span style="font-size: 28px;">
                                    ₹
                                    {{ number_format($product->prices[0]->trade_price) }}
                                </span>
                            </div>
                            <hr>
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="d-flex gap-2 align-items-center">
                                        <label for="">Qty:</label>
                                        <input type="number" class="form-control form-control-lg" value="1">
                                    </div>
                                </div>
                                <div class="col d-grid">
                                    <button class="btn btn-clean-dark btn-block">
                                        <i class="bi bi-cart-plus"></i>
                                        ADD TO CART</button>
                                </div>
                                <div class="col d-grid">
                                    <button class="btn btn-clean-yellow btn-block">
                                        <i class="bi bi-cart3"></i>
                                        BUY NOW</button>
                                </div>
                            </div>
                        @else
                            <div class="text-danger">
                                Unavailable
                            </div>
                        @endif
                    </div>
                    <div class="row mb-4 mt-4">
                        <div class="col-sm-6">
                            <div class="info-box clearfix">
                                <hr>
                                <div><strong class="f-16" style="font-weight: bold;">SPECIFICATION</strong></div>
                                <hr>
                            </div>

                            <div class="info-box pro_specification clearfix mt-5">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th width="30%">Style</th>
                                            <td>Contemporary</td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Suitable Room</th>
                                            <td>Living Room</td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Ara Natural finish</th>
                                            <td>Natural finish</td>
                                        </tr>
                                        <tr>
                                            <th>Primary Material</th>
                                            <td>Camel Bone</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="info-box clearfix">
                                <hr>
                                <div><strong class="f-16" style="font-weight: bold;">GENERAL INFORMATION</strong></div>
                                <hr>
                            </div>
                            <div class="table-responsive mt-5" style="margin: 7px 0 0px 0;">
                                <table class="table table-striped table-bordered" style="margin-bottom: 5px">
                                    <tbody>
                                        <tr>
                                            <th>Code</th>
                                            <td>TEJASSVI10</td>
                                        </tr>
                                        <tr>
                                            <th>Availability</th>
                                            <td>
                                                <span><i class="fa fa-check-square-o"></i> In stock</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <img src="https://www.omyfurniture.com/assets/images/ready-to-ship.png" alt="Stock Status"
                                    style="max-width: 100%;">
                            </div> <input type="hidden" name="primary_color" id="primary_color" value="">
                            <input type="hidden" name="secondary_color" id="secondary_color" value="">
                            <script type="text/javascript">
                                function add_wood(name, price) {

                                    $("#wood_name_val").val(name);
                                    $("#wood_price_val").val(price);

                                    $("#wood_name").html(name);
                                    $("#wood_price").html(price);

                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        </div>
        @if (!empty($similarProducts) && $similarProducts->count())
            <section class="related_products">
                <div class="todays-deals-section py-5 bg-white">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3 class="text-black">Related products with free delivery on eligible orders</h3>
                            <a href="#" class="ms-3 btn btn-outline-primary btn-sm">
                                See all deals <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>

                        <div class="light-slider">
                            @foreach ($similarProducts as $product)
                                {{-- <div class="bg-white rounded overflow-hidden">
                                    <img style="height:160px"
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZQUKdKtWwhS6JSpaPqD7blsRYsYoD9D_Ixg&usqp=CAU"
                                        alt="" class="card-img-top rounded-bottom">
                                    <div class="p-2">
                                        <h5 style="color: #007185;">
                                            bone inlay coffee table in stripe black & white pattern
                                        </h5>
                                        <i class="bi bi-star-fill text-primary"></i>
                                        <i class="bi bi-star-fill text-primary"></i>
                                        <i class="bi bi-star-fill text-primary"></i>
                                        <i class="bi bi-star-fill text-primary"></i>
                                        <i class="bi bi-star-half text-primary"></i>
                                        <small style="background-color: #B12704;"
                                            class="d-inline-block text-white px-3 py-1 fw-bold rounded mb-1 ">Free
                                            Delivery
                                        </small> <br>
                                        <span style="font-size: 20px; color:#B12704">Rs. 1660/-</span><br>
                                        <p class="text-black">List: <strike>Rs. 2530</strike> (20% off)</p>
                                    </div>
                                </div> --}}
                                <x-product-box :product="$product" />
                            @endforeach
                        </div>
                    </div>
            </section>
        @endif
        <div class="container py-5">
            <p>{!! nl2br($product->description) !!}</p>
        </div>
        </div>
    </section>
@endsection
