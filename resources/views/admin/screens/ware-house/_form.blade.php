<div class="mb-3">
    {{ Form::label('name', null, ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name.', 'required']) }}
</div>
<div class="mb-3">
    {{ Form::label('address', null, ['class' => 'form-label']) }}
    {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Enter address.', 'required']) }}
</div>
