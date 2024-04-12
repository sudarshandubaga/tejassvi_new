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
                        <div class="product-details">
                            <ul id="productImageSlider">
                                @foreach ($product->product_images as $thumb => $full)
                                    <li data-thumb="{{ $thumb }}">
                                        <a href="{{ $full }}" data-toggle="lightbox" data-gallery="product"
                                            class="d-block lightbox">
                                            <img src="{{ $full }}" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

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
                            <div class="row align-items-center gap-3 size-group">
                                <div class="col-2 col-lg-1">
                                    Size:
                                </div>
                                <div class="col-5">
                                    <select name="size_id" id="size_id" class="form-select">
                                        @foreach ($product->prices as $key => $price)
                                            <option value="{{ $price->size }}">{{ $price->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex gap-3 align-items-center mb-3">
                                @if ($product->prices[0]->price > $product->prices[0]->trade_price)
                                    <del class="text-danger" style="font-size: 18px;">
                                        ₹
                                        {{ number_format($product->prices[0]->price) }}
                                    </del> 
                                @endif
                                <span style="font-size: 28px;" class="text-success">
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
                                    <button class="btn btn-clean-dark btn-block add-to-cart">
                                        <i class="bi bi-cart-plus"></i>
                                        ADD TO CART
                                    </button>
                                </div>
                                <div class="col d-grid">
                                    <button class="btn btn-clean-yellow btn-block add-to-cart"
                                        data-redirect="{{ route('cart.index') }}">
                                        <i class="bi bi-cart3"></i>
                                        BUY NOW
                                    </button>
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
                                            <th width="30%">Dimenstions</th>
                                            <td>L16 x W12 x D12 inches</td>
                                        </tr>
                                        <tr>
                                            <th width="30%">SKU</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Assembly Requires</th>
                                            <td>NO</td>
                                        </tr>
                                        <tr>
                                            <th width="30%">
                                                Product Type
                                            </th>
                                            <td>{{ $product?->category?->name }}</td>
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
                                <img src="{{ asset('images/ready-to-ship.webp') }}" alt="Stock Status" class="w-100">
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
