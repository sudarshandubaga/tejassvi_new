@foreach ($categories as $category)
    <li class="has-dropdown">
        <a href="{{ $category->link }}">{{ $category->name }}
            @if (empty($category->category_id) && !empty($category->categories))
                <i class="bi bi-chevron-down"></i>
            @endif
        </a>
        <ul>
            @if (!empty($category->categories))
                <x-category-menu :categories="$category->categories" />
            @endif
        </ul>
    </li>
@endforeach
