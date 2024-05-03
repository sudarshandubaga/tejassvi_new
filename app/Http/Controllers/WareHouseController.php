<?php

namespace App\Http\Controllers;

use App\Models\WareHouse;
use Illuminate\Http\Request;

class WareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        request()->flush();

        $wareHouses = WareHouse::latest()->paginate(10);
        return view('admin.screens.ware-house.index', compact('wareHouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wareHouse = new WareHouse();
        $wareHouse->name = $request->name;
        $wareHouse->address = $request->address;
        $wareHouse->save();

        return redirect(route('admin.ware-house.index'))->with('success', 'Success! New data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WareHouse $wareHouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WareHouse $wareHouse)
    {
        request()->replace($wareHouse->toArray());
        request()->flash();

        return view('admin.screens.ware-house.edit', compact('wareHouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WareHouse $wareHouse)
    {
        $wareHouse->name = $request->name;
        $wareHouse->address = $request->address;
        $wareHouse->save();

        return redirect(route('admin.ware-house.index'))->with('success', 'Success! New data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WareHouse $wareHouse)
    {
        $wareHouse->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
