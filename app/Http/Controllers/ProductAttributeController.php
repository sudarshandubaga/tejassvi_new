<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productAttribute = new ProductAttribute();
        $productAttribute->product_id = $request->product_id;
        $productAttribute->size = $request->size;
        $productAttribute->price = $request->price;
        $productAttribute->discount = $request->discount;
        $productAttribute->trade_price = $request->trade_price;
        $productAttribute->price_usd = $request->price_usd;
        $productAttribute->discount_usd = $request->discount_usd;
        $productAttribute->trade_price_usd = $request->trade_price_usd;
        $productAttribute->save();

        return redirect()->back()->with('success', 'Product price added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ProductAttribute $productAttribute)
    {
        $request->replace($productAttribute->toArray());
        $request->flash();

        $product = Product::findOrFail($productAttribute->product_id);

        $prices = $product->prices;
        return view('admin.screens.product.price', compact('product', 'prices', 'productAttribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductAttribute $productAttribute)
    {
        $product = Product::find($request->product_id);

        $productAttribute->product_id = $request->product_id;
        $productAttribute->size = $request->size;
        $productAttribute->price = $request->price;
        $productAttribute->discount = $request->discount;
        $productAttribute->trade_price = $request->trade_price;
        $productAttribute->price_usd = $request->price_usd;
        $productAttribute->discount_usd = $request->discount_usd;
        $productAttribute->trade_price_usd = $request->trade_price_usd;
        $productAttribute->save();

        return redirect(route('admin.product.price', $product))->with('success', 'Product price updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductAttribute $productAttribute)
    {
        $productAttribute->delete();

        return redirect(route('admin.product.price', $productAttribute->product))->with('success', 'Success! Product price deleted.');
    }
}
