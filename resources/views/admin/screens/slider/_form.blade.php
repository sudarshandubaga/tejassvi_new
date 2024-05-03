<div class="mb-3">
    {{ Form::label('title', null, ['class' => 'form-label']) }}
    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) }}
</div>
<div class="mb-3">
    {{ Form::label('image_file', 'Choose Image', ['class' => 'form-label']) }}
    <label for="image_file" class="drop-zone">
        @if (!empty($slider->image))
            <figure>
                <img src="{{ $slider->image }}">
            </figure>
        @endif
        <p>click to upload image</p>
        <input type="file" accept="image/*" id="image_file" data-size="2000">
        <textarea name="image" class="d-none"></textarea>
    </label>
</div>
