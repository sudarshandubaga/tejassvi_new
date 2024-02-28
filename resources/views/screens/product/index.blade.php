@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3 xs-12">
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
                </div><hr>
                <div class="priceBar mb-3">
                    <label for="customRange1" class="form-label"><span style="font-size: 20px;">Price</span></label>
                    <input type="range" class="form-range" id="customRange1">
                </div><hr>
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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            40% - 60%
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            20% - 40%
                        </label>
                    </div>

                </div><hr>
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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Price High to Low
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            By Rating
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            By Popularity
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            By New Arrivals
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row g-3">
                    @for($i = 1; $i <= 12; $i++)
                    <div class="col-sm-4 col-xs-6">
                        <x-product-box />
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="py-5">
            <h1 class="home-title">Category 2</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente fugit deleniti id nemo, a cum modi molestiae, sed nisi optio assumenda molestias est temporibus earum fuga alias veritatis incidunt adipisci in quibusdam! Sequi quos ea ratione, magnam pariatur ut quibusdam, beatae perferendis voluptas, tempora laboriosam harum error saepe laborum necessitatibus iure! Distinctio provident sapiente ullam culpa error quam suscipit dolorem iure similique et nesciunt eius quaerat reprehenderit, ratione, ad odit modi atque reiciendis. Repudiandae voluptatibus cupiditate expedita dolores molestias soluta itaque, aut ad atque ab dignissimos, sed et. Eveniet quos, nihil facere inventore amet eum, eligendi non quaerat sint dolores laudantium repudiandae! Exercitationem, numquam blanditiis sint voluptatem, aspernatur ratione molestiae maiores reprehenderit nihil distinctio debitis consequatur officia illo, non culpa quos quisquam a autem laudantium? Porro molestias temporibus ipsa dolorum, iusto recusandae ex saepe? Dicta sed ut qui nostrum architecto impedit ratione voluptatem quo pariatur nobis, dolorum, natus praesentium perferendis. Cupiditate deleniti assumenda quisquam accusantium omnis dolor dolorum esse, fuga voluptate nemo! Animi obcaecati itaque cupiditate minus assumenda aliquam accusantium culpa, magnam, nesciunt eligendi tenetur sapiente expedita recusandae quaerat cum repellat sunt hic! Odio, amet ex illo aliquam quas quasi est dolorem quia voluptatum similique eum dolores autem omnis porro.</p>
        </div>
    </div>
</section>
@endsection