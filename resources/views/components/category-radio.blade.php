@if (!$category->categories->count())
    <div class="form-check">
        {{ Form::radio('category_id', $category->id, null, ['class' => 'form-check-input', 'id' => 'category' . $category->id]) }}
        <label class="form-check-label" for="category{{ $category->id }}">
            {{ $category->name }}
        </label>
    </div>
@else
    <div class="accordion-row {{ $isActive ? 'active' : '' }}">
        <span class="bx bx-chevron-right"></span> {{ $category->name }}
    </div>
@endif
