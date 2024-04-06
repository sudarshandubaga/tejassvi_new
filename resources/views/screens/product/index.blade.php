@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="d-lg-none d-grid mb-3 text-center">
                <button type="button" class="btn btn-outline-dark filter-btn d-flex gap-2">
                    <i class="bi bi-filter"></i> Filter & Sort By
                </button>
            </div>
            <div class="row">
                {{-- <div class="col-md-3 xs-12 filter-options">
                    <div class="filterBy">
                        <div class="mb-2">
                            <span style="font-size: 20px;">Filter By</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Category 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Category 2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Category 3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Category 4
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Category 5
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="priceBar mb-3">
                        <label for="customRange1" class="form-label"><span style="font-size: 20px;">Price</span></label>
                        <input type="range" class="form-range" id="customRange1">
                    </div>
                    <hr>
                    <div class="discoutBar mb-3">
                        <div class="mb-2">
                            <span style="font-size: 20px;">Discount</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                60% - 80%
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                40% - 60%
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                20% - 40%
                            </label>
                        </div>

                    </div>
                    <hr>
                    <div class="soryBy">
                        <div class="mb-2">
                            <span style="font-size: 20px;">Sort By</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                A-Z Name
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Z-A Name
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Price Low to High
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Price High to Low
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                By Rating
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                By Popularity
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                By New Arrivals
                            </label>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="row g-3">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-sm-4 col-6">
                                <x-product-box :product="$product" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="py-5">
                <h1 class="home-title">{{ $category->name }}</h1>
                <p>{{ $category->description }}</p>
            </div>
        </div>
    </section>
@endsection
