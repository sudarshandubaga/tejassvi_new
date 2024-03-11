@extends('layouts.app')

@section('content')
<section>
    <div class="cotainer">
        <div class="row">
            <div class="col-lg-9">
                <div class="d-flex cart_title_row mb-2 ">
                    <div class="mt-2 d-flex">
                        <div>
                            <div class="form-check mx-4">
                                <input class="form-check-input f-16" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </div>
                        <h5>Select All (3 Items)</h5>
                    </div>
                    <div class="mt-2">
                        <h5>Total: <span class="text-primary"> ₹ 90256 </span></h5>
                    </div>
                </div>
                <div class=" d-flex item_row mb-2 ">
                    <div class="left d-flex">
                        <div>
                            <div class="form-check mx-4">
                                <input class="form-check-input f-16" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </div>
                        <div class="py-2">
                            <img style="width: 80px; height:80px ; border-radius: 10px" src="https://m.media-amazon.com/images/I/71t2oz2jLbL.jpg" alt="">
                        </div>
                        <div style="max-width: 275px;" class="ms-4 f-16">Waterfall Bone Inlay Coffee Table</div><br>

                    </div>
                    <div class="left d-flex">
                        <div class="mx-4">
                            <div class="quantity-selector">
                                <input type="button" value="-" class="quantity-btn decrease">
                                <input type="number" value="1" min="1" max="999" class="quantity-input">
                                <input type="button" value="+" class="quantity-btn increase">
                            </div>
                        </div>
                        <div class="mx-5 f-16">Rs. 19500/-</div>
                        <div>
                            <i class="bi bi-trash text-danger f-16"></i>
                        </div>
                    </div>
                </div>
                <div class="d-flex item_row mb-2 ">
                    <div class="left d-flex">
                        <div>
                            <div class="form-check mx-4">
                                <input class="form-check-input f-16" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </div>
                        <div class="py-2">
                            <img style="width: 80px; height:80px ; border-radius: 10px" src="https://homesofrajasthan.com/wp-content/uploads/2023/10/Bone-Inlay-Nesting-Coffee-Table-scaled_20231010_164219252.jpg" alt="">
                        </div>
                        <div style="max-width: 275px;" class="ms-4 f-16">Waterfall Bone Inlay Coffee Table</div><br>

                    </div>
                    <div class="left d-flex">
                        <div class="mx-4">
                            <div class="quantity-selector">
                                <input type="button" value="-" class="quantity-btn decrease">
                                <input type="number" value="1" min="1" max="999" class="quantity-input">
                                <input type="button" value="+" class="quantity-btn increase">
                            </div>
                        </div>
                        <div class="mx-5 f-16">Rs. 19500/-</div>
                        <div>
                            <i class="bi bi-trash text-danger f-16"></i>
                        </div>
                    </div>
                </div>
                <div class="d-flex item_row mb-2 ">
                    <div class="left d-flex">
                        <div>
                            <div class="form-check mx-4">
                                <input class="form-check-input f-16" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </div>
                        <div class="py-2">
                            <img style="width: 80px; height:80px ; border-radius: 10px" src="https://cpimg.tistatic.com/07965675/b/4/Hexagon-Bone-Inlay-Coffee-Table.jpg" alt="">
                        </div>
                        <div style="max-width: 275px;" class="ms-4 f-16">Waterfall Bone Inlay Coffee Table</div><br>

                    </div>
                    <div class="left d-flex">
                        <div class="mx-4">
                            <div class="quantity-selector">
                                <input type="button" value="-" class="quantity-btn decrease">
                                <input type="number" value="1" min="1" max="999" class="quantity-input">
                                <input type="button" value="+" class="quantity-btn increase">
                            </div>
                        </div>
                        <div class="mx-5 f-16">Rs. 49500/-</div>
                        <div>
                            <i class="bi bi-trash text-danger f-16"></i>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-sm-3">
                <div class="card f-16 shadow" style="width: 18rem;">
                    <div class="cart-title">
                        <span>
                            <i class="bi bi-building-check"></i>
                            Payment Details</span>
                    </div>
                    <div class="paymentDetails">
                        <p>Subtotal:</p>
                        <p> ₹ 90225</p>
                    </div>
                    <div class="paymentDetails">
                        <p>Shipping:</p>
                        <p>Free Delivery</p>
                    </div>
                    <div class="paymentDetails">
                        <p class="f-16">Total:</p>
                        <p class="text-primary f-16"> ₹ 90256</p>
                    </div>
                    <div class="paymentDetails">
                        <button>PROCEED TO CHECKOUT</button>
                    </div>
                    <div class="paymentDetails">
                        <p class="text-primary"> <i class="bi bi-arrow-left text-primary"></i> Return to Shipping</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection