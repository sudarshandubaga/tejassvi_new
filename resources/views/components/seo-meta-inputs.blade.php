<h3 class="mt-5">SEO Meta Details</h3>

<div class="mb-3">
    {{ Form::label('seo_title', null, ['class' => 'form-label']) }}
    {{ Form::text('seo_title', null, ['class' => 'form-control', 'placeholder' => 'SEO Title']) }}
</div>
<div class="mb-3">
    {{ Form::label('seo_keywords', null, ['class' => 'form-label']) }}
    {{ Form::text('seo_keywords', null, ['class' => 'form-control', 'placeholder' => 'SEO Keywords']) }}
</div>
<div class="mb-3">
    {{ Form::label('seo_description', null, ['class' => 'form-label']) }}
    {{ Form::textarea('seo_description', null, ['class' => 'form-control', 'placeholder' => 'SEO Description', 'rows' => 3]) }}
</div>
