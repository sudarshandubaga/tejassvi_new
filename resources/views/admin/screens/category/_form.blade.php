<div class="row">
    <div class="col-sm-8 col-lg-9">
        <div class="mb-3">
            {{ Form::label('name', null, ['class' => 'form-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Category name.', 'required']) }}
        </div>

        <div class="mb-3">
            {{ Form::label('slug', 'Slug', ['class' => 'form-label mb-0']) }}
            <div class="mb-2">
                <small>
                    (leave blank to auto generate)
                </small>
            </div>
            {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter Category Slug.']) }}
        </div>

        <div class="mb-3">
            {{ Form::label('category_id', 'Select Category', ['class' => 'form-label']) }}
            {{ Form::select('category_id', $parents, null, ['class' => 'form-control', 'placeholder' => 'ROOT']) }}
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
                @if (!empty($category->image))
                    <figure>
                        <img src="{{ $category->image }}">
                    </figure>
                @endif
                <p>click to upload image</p>
                <input type="file" accept="image/*" id="image_file" data-size="2000">
                <textarea name="image" class="d-none"></textarea>
            </label>
        </div>
    </div>
</div>
