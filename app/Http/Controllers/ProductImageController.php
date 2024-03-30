<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
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
        $productImage = new ProductImage();
        $productImage->title = $request->title;
        $productImage->product_id = $request->product_id;
        if (!empty($request->image)) {
            $productImage->image = dataUriToImage($request->image, "products");
        }
        if (!empty($request->md_image)) {
            $productImage->md_image = dataUriToImage($request->md_image, "products");
        }
        if (!empty($request->thumb_image)) {
            $productImage->thumb_image = dataUriToImage($request->thumb_image, "products");
        }
        $productImage->save();

        return redirect()->back()->with('success', 'Success! Product image added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ProductImage $productImage)
    {
        $request->replace($productImage->toArray());
        $request->flash();

        $product = Product::findOrFail($productImage->product_id);
        $images = $product->images;
        return view('admin.screens.product.image', compact('product', 'images', 'productImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductImage $productImage)
    {
        $product = Product::find($request->product_id);

        $productImage->title = $request->title;
        $productImage->product_id = $request->product_id;
        if (!empty($request->image)) {
            if (!empty($productImage->image)) {
                unlink(public_path() . "/storage/" . $productImage->getRawOriginal('image'));
            }
            $productImage->image = dataUriToImage($request->image, "products");
        }
        if (!empty($request->md_image)) {
            if (!empty($productImage->md_image)) {
                unlink(public_path() . "/storage/" . $productImage->getRawOriginal('md_image'));
            }
            $productImage->md_image = dataUriToImage($request->md_image, "products");
        }
        if (!empty($request->thumb_image)) {
            if (!empty($productImage->thumb_image)) {
                unlink(public_path() . "/storage/" . $productImage->getRawOriginal('thumb_image'));
            }
            $productImage->thumb_image = dataUriToImage($request->thumb_image, "products");
        }
        $productImage->save();

        return redirect(route('admin.product.image', $product))->with('success', 'Success! Product image updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {
        if (!empty($productImage->image)) {
            unlink(public_path() . "/storage/" . $productImage->getRawOriginal('image'));
        }
        if (!empty($productImage->md_image)) {
            unlink(public_path() . "/storage/" . $productImage->getRawOriginal('md_image'));
        }
        if (!empty($productImage->thumb_image)) {
            unlink(public_path() . "/storage/" . $productImage->getRawOriginal('thumb_image'));
        }
        $productImage->delete();

        return redirect(route('admin.product.image', $productImage->product))->with('success', 'Success! Product image deleted.');
    }
}
