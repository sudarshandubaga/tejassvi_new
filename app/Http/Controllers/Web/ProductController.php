<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($category, $subcategory1 = null, $subcategory2 = null)
    {
        $query = Product::query();

        if ($subcategory2) {
            $category = Category::where('slug', $subcategory2)->firstOrFail();
            $query->where('category_id', $category->id);
        } else if ($subcategory1) {
            $category = Category::where('slug', $subcategory1)->firstOrFail();
            $query->where('category_id', $category->id)
                ->orWhereHas('category', function ($q) use ($category) {
                    return $q->where('category_id', $category->id);
                });
        } else {
            $category = Category::where('slug', $category)->firstOrFail();
            $query->where('category_id', $category->id)
                ->orWhereHas('category', function ($q) use ($category) {
                    return $q->where('category_id', $category->id)
                        ->orWhereHas('parent', function ($q) use ($category) {
                            return $q->where('category_id', $category->id);
                        });
                });
        }

        $products = $query->latest()->paginate(30);

        return view('screens.product.index', compact('products', 'category'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $similarProducts = Product::has('prices')->where('category_id', $product->category_id)
            ->whereNot('id', $product->id)
            ->skip(0)->take(15)->get();

        return view('screens.product.show', compact('product', 'similarProducts'));
    }
}
