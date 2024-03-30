@extends('admin.layouts.afterlogin')

@section('title', 'Product Image - ' . substr($product->name, 0, 40))

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-4 col-lg-3 border-end">
                        <h5>
                            Add Product Image
                        </h5>
                        @if (empty($productImage))
                            {{ Form::open(['url' => route('admin.product-image.store')]) }}
                        @else
                            {{ Form::open(['url' => route('admin.product-image.update', $productImage), 'method' => 'PUT']) }}
                        @endif
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mb-3">
                            {{ Form::label('title', null, ['class' => 'form-label']) }}
                            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title', 'required' => 'required']) }}
                        </div>
                        <div class="mb-3">
                            {{ Form::label('image_file', 'Choose Image', ['class' => 'form-label']) }}
                            <label for="image_file" class="drop-zone">
                                @if (!empty($productImage->image))
                                    <figure>
                                        <img src="{{ $productImage->image }}">
                                    </figure>
                                @endif
                                <p>click to upload image</p>
                                <input type="file" accept="image/*" id="image_file" data-thumb="1">
                                <textarea name="image" class="d-none full"></textarea>
                                <textarea name="md_image" class="d-none medium"></textarea>
                                <textarea name="thumb_image" class="d-none thumb"></textarea>
                            </label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary">Save</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <div class="col-sm-8 col-lg-9">
                        <h5>View Images</h5>

                        @forelse ($images as $image)
                            <div class="d-flex justify-contents-between align-items-center border rounded mb-3 p-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-3">
                                        <div>
                                            <img src="{{ $image->thumb_image }}" alt="{{ $image->title }}" class="rounded">
                                        </div>
                                        <div>
                                            <strong>{{ $image->title }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3">
                                    <a href="{{ route('admin.product-image.edit', $image) }}"
                                        class="btn btn-link bx bx-pencil"></a>
                                    <button class="btn btn-link text-danger bx bx-trash btn-delete"
                                        data-href="{{ route('admin.product-image.destroy', $image) }}"></button>
                                </div>
                            </div>
                        @empty
                            <div>No data found.</div>
                        @endforelse
                    </div>
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-outline-primary">View Products <i
                            class="bx bx-right-arrow-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection

@push('extra_scripts')
    <script>
        $(function() {
            $(document).on("keyup change", ".price, .discount", function() {
                let self = this,
                    parent = $(self).closest('.row');

                let price = parent.find('.price').val(),
                    discount = parent.find('.discount').val();

                if (price != '')
                    price = parseInt(price);
                else
                    price = 0;
                if (discount != '')
                    discount = parseInt(discount);
                else
                    discount = 0;

                parent.find('.trade_price').val(price - (price * discount / 100));
            });
        });
    </script>
@endpush
