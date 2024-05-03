@extends('admin.layouts.afterlogin')

@section('title', 'Product Price - ' . substr($product->name, 0, 40))

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-5 border-end">
                        <h5>
                            Add Product Price
                        </h5>
                        @if (empty($productAttribute))
                            {{ Form::open(['url' => route('admin.product-attribute.store')]) }}
                        @else
                            {{ Form::open(['url' => route('admin.product-attribute.update', $productAttribute), 'method' => 'PUT']) }}
                        @endif
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mb-3">
                            {{ Form::label('size', null, ['class' => 'form-label']) }}
                            {{ Form::text('size', null, ['class' => 'form-control', 'placeholder' => 'Enter size', 'required' => 'required']) }}
                        </div>
                        <h6 class="text-primary">Price - INR (₹)</h6>
                        <div class="row g-1">
                            <div class="col mb-3">
                                {{ Form::label('price', null, ['class' => 'form-label']) }}
                                {{ Form::number('price', null, ['class' => 'form-control price', 'placeholder' => 'Enter price', 'required' => 'required']) }}
                            </div>
                            <div class="col-3 mb-3">
                                {{ Form::label('discount', null, ['class' => 'form-label']) }}
                                {{ Form::number('discount', 0, ['class' => 'form-control discount', 'placeholder' => 'in %', 'required' => 'required', 'min' => 0, 'max' => 100]) }}
                            </div>
                            <div class="col mb-3">
                                {{ Form::label('trade_price', null, ['class' => 'form-label']) }}
                                {{ Form::number('trade_price', null, ['class' => 'form-control trade_price', 'placeholder' => 'Enter trade_price', 'required' => 'required', 'readonly' => 'readonly']) }}
                            </div>

                        </div>
                        <h6 class="text-primary">Price - USD ($)</h6>
                        <div class="row g-1">
                            <div class="col mb-3">
                                {{ Form::label('price_usd', 'Price', ['class' => 'form-label']) }}
                                {{ Form::number('price_usd', null, ['class' => 'form-control price', 'placeholder' => 'Enter price', 'required' => 'required']) }}
                            </div>
                            <div class="col-3 mb-3">
                                {{ Form::label('discount_usd', 'Discount', ['class' => 'form-label']) }}
                                {{ Form::number('discount_usd', 0, ['class' => 'form-control discount', 'placeholder' => 'in %', 'required' => 'required', 'min' => 0, 'max' => 100]) }}
                            </div>
                            <div class="col mb-3">
                                {{ Form::label('trade_price_usd', 'Trade Price', ['class' => 'form-label']) }}
                                {{ Form::number('trade_price_usd', null, ['class' => 'form-control trade_price', 'placeholder' => 'Enter trade_price', 'required' => 'required', 'readonly' => 'readonly']) }}
                            </div>
                        </div>
                        <div class="mb-3">
                            {{ Form::label('stock', null, ['class' => 'form-label']) }}
                            {{ Form::number('stock', 0, ['class' => 'form-control', 'min' => 0]) }}
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Save</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <div class="col-sm-7">
                        <h5>View Prices</h5>

                        @forelse ($prices as $price)
                            <div class="d-flex justify-contents-between align-items-center border rounded mb-3 p-3">
                                <div class="flex-grow-1">
                                    <div>
                                        <strong>{{ $price->size }}</strong>

                                        <span class="{{ $price->stock > 0 ? 'text-success' : 'text-danger' }}">
                                            ({{ $price->stock > 0 ? 'In' : 'Out of' }} Stock: {{ $price->stock }})
                                        </span>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <div>
                                            <div>
                                                <del class="text-secondary me-1">₹{{ $price->price }}</del>
                                                <span class="fs-3">₹{{ $price->trade_price }}</span>
                                            </div>
                                            <div class="text-primary">On {{ $price->discount }}% Discount</div>
                                        </div>
                                        <div>
                                            <div>
                                                <del class="text-secondary me-1">${{ $price->price_usd }}</del>
                                                <span class="fs-3">${{ $price->trade_price_usd }}</span>
                                            </div>
                                            <div class="text-primary">On {{ $price->discount_usd }}% Discount</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3">
                                    <a href="{{ route('admin.product-attribute.edit', $price) }}"
                                        class="btn btn-link bx bx-pencil"></a>
                                    <button class="btn btn-link text-danger bx bx-trash btn-delete"
                                        data-href="{{ route('admin.product-attribute.destroy', $price) }}"></button>
                                </div>
                            </div>
                        @empty
                            <div>No data found.</div>
                        @endforelse
                    </div>
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.product.image', $product) }}" class="btn btn-outline-primary">Next <i
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
