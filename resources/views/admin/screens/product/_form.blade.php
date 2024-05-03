<div class="row">
    <div class="col-sm-8 col-lg-9">
        <div class="row">
            <div class="col-sm-8">
                <div class="mb-3">
                    {{ Form::label('name', null, ['class' => 'form-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Product name.', 'required']) }}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    {{ Form::label('code', null, ['class' => 'form-label']) }}
                    {{ Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Code.', 'required']) }}
                </div>
            </div>
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

        <div class="row">
            {{-- <div class="col-sm-6 mb-3">
                {{ Form::label('color_id', null, ['class' => 'form-label']) }}
                {{ Form::select('color_id', $colors, null, ['class' => 'form-control', 'placeholder' => 'Select Color', 'required']) }}
            </div> --}}
            <div class="col-sm-12 mb-3">
                {{ Form::label('hsn_id', null, ['class' => 'form-label']) }}
                {{ Form::select('hsn_id', $hsns, null, ['class' => 'form-control', 'placeholder' => 'Select HSN/SAC', 'required']) }}
            </div>
        </div>

        <div class="mb-3">
            {{ Form::label('description', null, ['class' => 'form-label']) }}
            {{ Form::textarea('description', null, ['class' => 'form-control editor', 'placeholder' => 'Enter Description Here', 'rows' => 5]) }}
        </div>

        <h5 class="card-title">Extra Attributes</h5>
        {{-- <div class="mb-3">
            <button type="button" class="btn btn-outline-dark btn-sm add-attr-btn">
                <i class="bx bx-plus"></i> Add
            </button>
        </div>
        <div id="attributes">

        </div> --}}

        <div class="row align-items-center">
            <div class="mb-3 col-sm-4">
                <label class="form-label mb-0">SKU</label>
            </div>
            <div class="mb-3 col-sm-8">
                {{ Form::text('sku', null, ['class' => 'form-control', 'placeholder' => 'SKU']) }}
            </div>
        </div>

        <div class="row align-items-center">
            <div class="mb-3 col-sm-4">
                <label class="form-label mb-0">Primary Material</label>
            </div>
            <div class="mb-3 col-sm-8">
                {{ Form::text('material', null, ['class' => 'form-control', 'placeholder' => 'Primary Material']) }}
            </div>
        </div>

        <div class="row align-items-center">
            <div class="mb-3 col-sm-4">
                <label class="form-label mb-0">Assembly Requires</label>
            </div>
            <div class="mb-3 col-sm-8">
                {{ Form::select(
                    'is_assembly',
                    [
                        'Assembly Required' => 'Assembly Required',
                        'No Assembly Required' => 'No Assembly Required',
                        'Partial Assembly Required' => 'Partial Assembly Required',
                    ],
                    null,
                    ['class' => 'form-control', 'placeholder' => 'Select Option'],
                ) }}
            </div>
        </div>

        <div class="row align-items-center">
            <div class="mb-3 col-sm-4">
                <label class="form-label mb-0">Dimenstions</label>
            </div>
            <div class="mb-3 col-sm-8">
                {{ Form::text('dimenstions', null, ['class' => 'form-control', 'placeholder' => 'Dimenstions']) }}
            </div>
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
            <h5>Colors</h5>
            @foreach ($colors as $colorId => $colorName)
                <div class="form-check">
                    {{ Form::checkbox('color_ids[]', $colorId, null, ['class' => 'form-check-input', 'id' => 'color_id' . $colorId]) }}
                    <label class="form-check-label" for="color_{{ $colorId }}">
                        {{ $colorName }}
                    </label>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="mb-3">
            <h5>Categories</h5>
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


@push('extra_scripts')
    <script>
        function adjustIndexAttr() {
            let i = 0;
            $('.attr-row').each(function() {
                $(this).find('.name').attr('name', `attributes[${i}][name]`);
                $(this).find('.value').attr('name', `attributes[${i}][value]`);

                i++;
            });
        }

        $(function() {
            $(window).on("load", function() {
                adjustIndexAttr();
            });
            $(document).on("click", ".add-attr-btn", function() {
                let html = `
                    <div class="row attr-row">
                        <div class="mb-3 col-sm-4">
                            <label class="form-label">Name</label>
                            <input type="text" placeholder="Name" class="form-control name">
                        </div>
                        <div class="mb-3 col-sm-8">
                            <label class="form-label">Value</label>
                            <input type="text" placeholder="Value" class="form-control value">
                        </div>
                    </div>
                `;

                $('#attributes').append(html);

                adjustIndexAttr()
            });
        });
    </script>
@endpush
