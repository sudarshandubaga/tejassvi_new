<div class="bg-white shadow rounded overflow-hidden border product-box">
    <a href="{{ route('product.show', $product) }}" title="{{ $product->name }}"></a>
    <figure>
        <img src="{{ $product->md_image }}" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-fluid">
    </figure>
    <div class="p-3">
        <h5 class="text-primary text-center text-lg-start">
            {{ $product->name }}
        </h5>
        <div class="d-flex flex-column flex-lg-row align-items-center">
            <del class="text-secondary">
                <span class="currency">₹</span> {{ number_format($product->prices[0]->price) }}
            </del>
            <div class="ms-2 fs-4">
                <span class="currency">₹</span> {{ number_format($product->prices[0]->trade_price) }}
            </div>
        </div>
    </div>
</div>
