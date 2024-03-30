<div class="mb-3">
    {{ Form::label('seo_title', null, ['class' => 'form-label']) }}
    {{ Form::text('seo_title', null, ['class' => 'form-control', 'placeholder' => 'Enter seo title']) }}
</div>
<div class="mb-3">
    {{ Form::label('seo_keywords', null, ['class' => 'form-label']) }}
    {{ Form::text('seo_keywords', null, ['class' => 'form-control', 'placeholder' => 'Enter seo keywords']) }}
</div>
<div class="mb-3">
    {{ Form::label('seo_description', null, ['class' => 'form-label']) }}
    {{ Form::textarea('seo_description', null, ['class' => 'form-control', 'placeholder' => 'Enter seo description', 'rows' => 3]) }}
</div>
<div class="row">
    <div class="mb-3 col-sm-4 col-lg-3">
        {{ Form::label('image_file', 'Choose Cover Image', ['class' => 'form-label']) }}
        <label for="image_file" class="d-block upload-image">
            <img src="{{ !empty($seoMeta->image) ? $seoMeta->image : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930' }}"
                alt="" id="img-preview" loading="lazy">
            {{ Form::file('image_file', ['class' => 'd-none', 'data-target' => '#img-preview', 'data-text-target' => '#image']) }}
        </label>
        <textarea name="image" id="image" class="d-none">{{ !empty($seoMeta->image) ? $seoMeta->image : null }}</textarea>
    </div>
</div>
