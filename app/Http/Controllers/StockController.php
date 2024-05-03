<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StockController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit = request('limit') ?: 10;
        $type = request('type') ?: 'default';
        $query = Stock::query();

        if ($type === 'trash') {
            $query->onlyTrashed();
        }

        $stocks = $query->latest()->paginate($limit);

        return view('admin.screens.stock.index', compact('stocks', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        request()->flush();

        $categories = Category::whereNull('category_id')->orderBy('name')->pluck('name', 'id');
        return view('admin.screens.stock.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        foreach ($request->stock as $stock) {
            if ($stock['qty']) {
                $stock = new Stock($stock);
                $stock->save();
            }
        }

        return redirect(route('admin.stock.index'))->with('success', 'Success! New data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        request()->replace($stock->toArray());
        request()->flash();

        $parents = Stock::where('stock_id', $stock->id)->orderBy('name')->pluck('name', 'id');
        return view('admin.screens.stock.edit', compact('stock', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        $stock->name = $request->name;
        $stock->slug = $request->slug ?? $this->genSlug($request->name, $stock->id);
        $stock->stock_id = $request->stock_id;
        $stock->description = $request->description;
        if (!empty($request->image)) {
            if ($stock->image) {
                unlink(public_path() . "/storage/" . $stock->getRawOriginal('image'));
            }
            $stock->image = dataUriToImage($request->image, "categories");
        }
        $stock->seo_title = $request->seo_title;
        $stock->seo_keywords = $request->seo_keywords;
        $stock->seo_description = $request->seo_description;
        $stock->save();

        return redirect(route('admin.stock.index'))->with('success', 'Success! New data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }

    public function deletePermanent($stock)
    {
        $stock = Stock::onlyTrashed()->find($stock);

        if ($stock->image) {
            unlink(public_path() . "/storage/" . $stock->getRawOriginal('image'));
            // Storage::delete($stock->getRawOriginal('image'));
        }

        $stock->forceDelete();

        return redirect()->back()->with('success', 'Success! A data has been deleted from trash.');
    }

    public function restore($stock)
    {
        $stock = Stock::onlyTrashed()->where('slug', $stock)->firstOrFail();

        $stock->restore();

        return redirect(route('admin.stock.index'))->with('success', 'Success! A data has been restored from trash.');
    }

    public function products(Request $request)
    {
        $products = Product::with('prices')->withCount('prices')
            ->where('category_id', $request->category_id)
            ->orWhereHas('category', function ($q) use ($request) {
                return $q->where('category_id', $request->category_id)
                    ->orWhereHas('parent', function ($q) use ($request) {
                        return $q->where('category_id', $request->category_id);
                    });
            })
            ->orderBy('name')
            ->get();

        $warehouses = WareHouse::orderBy('name')->pluck('name', 'id');

        // echo '<pre>';
        // var_dump($products->toArray());
        // echo '</pre>';

        return view('admin.screens.stock.products', compact('products', 'warehouses'));
    }
}
