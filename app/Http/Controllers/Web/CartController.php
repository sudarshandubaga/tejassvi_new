<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('screens.cart.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    protected function getCartItems()
    {
        $cartItems = session()->get('cartItems');

        $products = [];
        foreach ($cartItems as $id => $qty) {
            $product = ProductAttribute::with('product')->find($id);
            $products[] = $product;
        }

        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'size_id' => 'required|numeric',
            'qty'     => 'required|numeric'
        ]);

        $cartItems = session()->get('cartItems');

        $cartItems[$request->size_id] = $request->qty;

        session()->put(['cartItems' => $cartItems]);

        return response()->json([
            'message' => 'item added to cart.',
            'products' => $this->getCartItems()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('screens.product.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartItems = session()->get('cartItems');

        if (isset($cartItems[$id]))
            unset($cartItems[$id]);

        session()->put(['cartItems' => $cartItems]);

        return response()->json([
            'message' => 'item removed from cart.',
            'products' => $this->getCartItems()
        ]);
    }
}
