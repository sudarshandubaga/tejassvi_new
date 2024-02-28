<div class="bg-white shadow rounded overflow-hidden border product-box">
    <a href="{{ route('product.show', ['product-title']) }}"></a>
    <div>
        <img src="{{ asset('images/product/1/GALL_3.jpg') }}" alt=""
            class="img-fluid">
    </div>
    <div class="p-3">
        <h5 class="text-primary">
            Product Title
        </h5>
        <div class="d-flex align-items-center">
            <del class="text-secondary">
                <span class="currency">₹</span> {{ number_format(5999, 2) }}
            </del>
            <div class="ms-2 fs-4">
                <span class="currency">₹</span> {{ number_format(4599, 2) }}
            </div>
        </div>
    </div>
</div>