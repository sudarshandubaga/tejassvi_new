<div class="row">
    <div class="col-sm-8 col-lg-9">
        <div class="mb-3">
            {{ Form::label('name', null, ['class' => 'form-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Product name.', 'required']) }}
        </div>

        <div class="mb-3">
            {{ Form::label('slug', 'Slug', ['class' => 'form-label mb-0']) }}
            <div class="mb-2">
                <small>
                    (leave blank to auto generate)
                </small>
            </div>
            {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Slug.']) }}
        </div>

        <div class="mb-3">
            {{ Form::label('description', null, ['class' => 'form-label']) }}
            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Description Here', 'rows' => 5]) }}
        </div>

        <x-seo-meta-inputs />
    </div>
    <div class="col-sm-4 col-lg-3">
        <div class="mb-3">
            {{ Form::label('image_file', 'Choose Image', ['class' => 'form-label']) }}
            <label for="image_file" class="drop-zone">
                @if (!empty($product->thumb_image))
                    <figure>
                        <img src="{{ $product->thumb_image }}">
                    </figure>
                @endif
                <p>click to upload image</p>
                <input type="file" accept="image/*" id="image_file" data-thumb="1">
                <textarea name="image" class="d-none full"></textarea>
                <textarea name="md_image" class="d-none medium"></textarea>
                <textarea name="thumb_image" class="d-none thumb"></textarea>
            </label>
        </div>
        <hr>
        <div class="mb-3">
            <h4>Categories</h4>
            @foreach ($categories as $category)
                <x-category-radio :category="$category" :isActive="!empty($product) &&
                    ($category->id == @$product->category_id ||
                        in_array(@$product->category_id, $category->category_ids))" />
                @if (!empty($category->categories))
                    <div class="ms-4 accordion-content">
                        @foreach ($category->categories as $subcategory)
                            <x-category-radio :category="$subcategory" :isActive="!empty($product) &&
                                ($subcategory->id == @$product->category_id ||
                                    in_array(@$product->category_id, $subcategory->category_ids))" />

                            @if (!empty($subcategory->categories))
                                <div class="ms-4 accordion-content">
                                    @foreach ($subcategory->categories as $subcategory2)
                                        <x-category-radio :category="$subcategory2" :isActive="!empty($product) &&
                                            ($subcategory2->id == @$product->category_id ||
                                                in_array(@$product->category_id, $subcategory2->category_ids))" />
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
