@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="main">
            <div class="row d-flex">
                <div class="col-md-6 col-sm-12">
                    <div class="image-div mb-3">
                        <img style="width: 450px; height:300px" src="https://gardenaura.in/cdn/shop/products/fgfinal3_1200x.jpg?v=1668757573" alt="">
                    </div>
                    <div class="hover-zoom mb-3">Hover to Zoom Image</div>
                    <div class="extraImgs d-flex">
                        @for ($i = 1; $i <= 6; $i++) <div class="extraImgs d-flex">
                            <img style="width: 100px; height:70px" src="https://gardenaura.in/cdn/shop/products/fgfinal3_1200x.jpg?v=1668757573" alt="">
                    </div>
                    @endfor
                </div>
            </div>
            <div class="col-md-6 col-sm-12"></div>
        </div>
    </div>


    <div class="py-5">
        <h1 class="home-title">Category 2</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente fugit deleniti id nemo, a cum modi molestiae, sed nisi optio assumenda molestias est temporibus earum fuga alias veritatis incidunt adipisci in quibusdam! Sequi quos ea ratione, magnam pariatur ut quibusdam, beatae perferendis voluptas, tempora laboriosam harum error saepe laborum necessitatibus iure! Distinctio provident sapiente ullam culpa error quam suscipit dolorem iure similique et nesciunt eius quaerat reprehenderit, ratione, ad odit modi atque reiciendis. Repudiandae voluptatibus cupiditate expedita dolores molestias soluta itaque, aut ad atque ab dignissimos, sed et. Eveniet quos, nihil facere inventore amet eum, eligendi non quaerat sint dolores laudantium repudiandae! Exercitationem, numquam blanditiis sint voluptatem, aspernatur ratione molestiae maiores reprehenderit nihil distinctio debitis consequatur officia illo, non culpa quos quisquam a autem laudantium? Porro molestias temporibus ipsa dolorum, iusto recusandae ex saepe? Dicta sed ut qui nostrum architecto impedit ratione voluptatem quo pariatur nobis, dolorum, natus praesentium perferendis. Cupiditate deleniti assumenda quisquam accusantium omnis dolor dolorum esse, fuga voluptate nemo! Animi obcaecati itaque cupiditate minus assumenda aliquam accusantium culpa, magnam, nesciunt eligendi tenetur sapiente expedita recusandae quaerat cum repellat sunt hic! Odio, amet ex illo aliquam quas quasi est dolorem quia voluptatum similique eum dolores autem omnis porro.</p>
    </div>
    </div>
</section>
@endsection