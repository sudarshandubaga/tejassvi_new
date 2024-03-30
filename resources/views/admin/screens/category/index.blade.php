@extends('admin.layouts.afterlogin')

@section('title', 'Category')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <div class="card-body">
                @if ($categories->isEmpty())
                    <div>No data found.</div>
                @else
                    <h5>
                        {{ $categories->firstItem() .
                            ' to ' .
                            $categories->lastItem() .
                            ' of ' .
                            $categories->total() .
                            ' are showing.' }}
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>
                                            {{ $key + $categories->firstItem() }}
                                        </td>
                                        <td>
                                            @if ($category->image)
                                                <img src="{{ $category->image }}" alt="{{ $category->name }}"
                                                    class="img img-thumbnail">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->parent?->name ?: 'ROOT' }}
                                        </td>
                                        <td>
                                            @if ($type === 'default')
                                                <a href="{{ route('admin.category.edit', $category) }}" title="Edit"
                                                    class="btn btn-link">
                                                    <i class="bx bxs-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-link text-danger btn-delete"
                                                    data-href="{{ route('admin.category.destroy', [$category]) }}">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            @else
                                                <button data-href="{{ route('admin.category.restore', $category) }}"
                                                    title="Restore" class="btn btn-link btn-restore">
                                                    <i class="bx bx-undo"></i>
                                                </button>
                                                <button type="button" class="btn btn-link text-danger btn-delete"
                                                    data-href="{{ route('admin.category.delete', [$category]) }}">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

@push('extra_styles')
@endpush

@push('extra_scripts')
@endpush
