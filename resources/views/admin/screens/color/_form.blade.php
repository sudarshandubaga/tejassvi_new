<div class="mb-3">
    {{ Form::label('name', null, ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name.', 'required']) }}
</div>

<div class="mb-3">
    {{ Form::label('image_file', 'Choose Image', ['class' => 'form-label']) }}
    <label for="image_file" class="drop-zone">
        @if (!empty($color->image))
            <figure>
                <img src="{{ $color->image }}">
            </figure>
        @endif
        <p>click to upload image</p>
        <input type="file" accept="image/*" id="image_file" data-size="100">
        <textarea name="image" class="d-none"></textarea>
    </label>
</div>
