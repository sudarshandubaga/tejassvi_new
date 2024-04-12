<div class="mb-3">
    {{ Form::label('code', null, ['class' => 'form-label']) }}
    {{ Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Enter code.', 'required']) }}
</div>
<div class="mb-3">
    {{ Form::label('gst', null, ['class' => 'form-label']) }}
    {{ Form::number('gst', 0, ['class' => 'form-control', 'placeholder' => 'Enter gst.', 'required']) }}
</div>
