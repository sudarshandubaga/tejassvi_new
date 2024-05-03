<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Hsn;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected function genSlug($name, $id = null)
    {
        $slug = Str::slug($name, '-');
        $query = Product::where('slug', 'LIKE', '%' . $slug . '%');

        if ($id) {
            $query->whereNot('id', $id);
        }

        $count = $query->count();


        if ($count) $slug .= '-' . ($count - 1);

        return $slug;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?: 10;
        $query = Product::withCount(['prices', 'images']);

        $products = $query->latest()->paginate($limit);

        $type = $request->type ?: 'default';

        return view('admin.screens.product.index', compact('products', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hsns = Hsn::orderBy('code')->pluck('code', 'id');
        $colors = Color::orderBy('name')->pluck('name', 'id');
        $categories = Category::whereNull('category_id')->get();
        return view('admin.screens.product.create', compact('categories', 'hsns', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug ?? $this->genSlug($request->name);
        $product->category_id = $request->category_id;
        $product->code = $request->code;
        // $product->color_id = $request->color_id;
        $product->hsn_id = $request->hsn_id;
        $product->sku = $request->sku;
        $product->dimenstions = $request->dimenstions;
        $product->is_assembly = $request->is_assembly;
        $product->material = $request->material;
        $product->attributes = $request->attributes;
        $product->description = $request->description;

        if (!empty($request->color_ids))
            $product->color_ids = implode(",", $request->color_ids);

        if (!empty($request->image)) {
            $product->image = dataUriToImage($request->image, "products");
        }
        if (!empty($request->md_image)) {
            $product->md_image = dataUriToImage($request->md_image, "products");
        }
        if (!empty($request->thumb_image)) {
            $product->thumb_image = dataUriToImage($request->thumb_image, "products");
        }
        $product->seo_title = $request->seo_title;
        $product->seo_keywords = $request->seo_keywords;
        $product->seo_description = $request->seo_description;
        $product->save();

        return redirect(route('admin.product.price', $product))->with('success', 'Success! A product has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Product $product)
    {
        $reqData = $product->toArray();
        $reqData['color_ids'] = explode(",", $product->color_ids);
        $request->replace($reqData);
        $request->flash();

        $hsns = Hsn::orderBy('code')->pluck('code', 'id');
        $colors = Color::orderBy('name')->pluck('name', 'id');
        $categories = Category::whereNull('category_id')->get();
        return view('admin.screens.product.edit', compact('categories', 'product', 'hsns', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->slug = $request->slug ?? $this->genSlug($request->name);
        $product->category_id = $request->category_id;
        $product->code = $request->code;
        // $product->color_id = $request->color_id;
        $product->hsn_id = $request->hsn_id;
        $product->sku = $request->sku;
        $product->dimenstions = $request->dimenstions;
        $product->is_assembly = $request->is_assembly;
        $product->material = $request->material;
        $product->attributes = $request->attributes;
        $product->description = $request->description;

        $product->color_ids = !empty($request->color_ids) ? implode(",", $request->color_ids) : null;

        if (!empty($request->image)) {
            if (!empty($product->image)) {
                unlink(public_path() . "/storage/" . $product->getRawOriginal('image'));
            }
            $product->image = dataUriToImage($request->image, "products");
        }
        if (!empty($request->md_image)) {
            if (!empty($product->md_image)) {
                unlink(public_path() . "/storage/" . $product->getRawOriginal('md_image'));
            }
            $product->md_image = dataUriToImage($request->md_image, "products");
        }
        if (!empty($request->thumb_image)) {
            if (!empty($product->thumb_image)) {
                unlink(public_path() . "/storage/" . $product->getRawOriginal('thumb_image'));
            }
            $product->thumb_image = dataUriToImage($request->thumb_image, "products");
        }

        $product->seo_title = $request->seo_title;
        $product->seo_keywords = $request->seo_keywords;
        $product->seo_description = $request->seo_description;
        $product->save();

        return redirect(route('admin.product.price', $product))->with('success', 'Success! A product has been added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (!empty($product->image)) {
            unlink(public_path() . "/storage/" . $product->getRawOriginal('image'));
        }
        if (!empty($product->md_image)) {
            unlink(public_path() . "/storage/" . $product->getRawOriginal('md_image'));
        }
        if (!empty($product->thumb_image)) {
            unlink(public_path() . "/storage/" . $product->getRawOriginal('thumb_image'));
        }
        $product->delete();

        return redirect()->back()->with('success', 'Success! Product has been deleted.');
    }

    public function price(Product $product)
    {
        request()->flush();

        $prices = $product->prices;
        return view('admin.screens.product.price', compact('product', 'prices'));
    }

    public function image(Product $product)
    {
        request()->flush();

        $images = $product->images;
        return view('admin.screens.product.image', compact('product', 'images'));
    }
}
