@extends('admin.layouts.afterlogin')

@section('title', 'Product')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">View Products</h5>
            <div class="card-body">
                @if ($products->isEmpty())
                    <div>No data found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Prices</th>
                                    <th>Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>
                                            {{ $key + $products->firstItem() }}
                                        </td>
                                        <td>
                                            @if ($product->thumb_image)
                                                <img src="{{ $product->thumb_image }}" alt="{{ $product->name }}"
                                                    class="img img-thumbnail">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ $product->category_name }}
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{ route('admin.product.price', $product) }}"
                                                    style="white-space: nowrap">Add / View
                                                    ({{ $product->prices_count }})
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{ route('admin.product.image', $product) }}"
                                                    style="white-space: nowrap">Add / View
                                                    ({{ $product->images_count }})
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($type === 'default')
                                                <a href="{{ route('admin.product.edit', $product) }}" title="Edit"
                                                    class="btn btn-link">
                                                    <i class="bx bxs-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-link text-danger btn-delete"
                                                    data-href="{{ route('admin.product.destroy', [$product]) }}">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            @else
                                                <button data-href="{{ route('admin.product.restore', $product) }}"
                                                    title="Restore" class="btn btn-link btn-restore">
                                                    <i class="bx bx-undo"></i>
                                                </button>
                                                <button type="button" class="btn btn-link text-danger btn-delete"
                                                    data-href="{{ route('admin.product.delete', [$product]) }}">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
