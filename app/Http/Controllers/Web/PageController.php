<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug);
        if ($category->count()) {
            return App::call('\App\Http\Controllers\Web\ProductController@index', ['category' => $slug]);
        } else {
            $product = Product::where('slug', $slug);

            if ($product->count()) {
                $product = $product->first();
                return App::call('\App\Http\Controllers\Web\ProductController@show', ['product' => $product]);
            } else {
                $page = Page::where('slug', $slug)->firstOrFail();
                return view('screens.page.show', compact('page'));
            }
        }
    }
}
