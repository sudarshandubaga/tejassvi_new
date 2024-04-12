<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        request()->flush();

        $colors = Color::latest()->paginate(10);
        return view('admin.screens.color.index', compact('colors'));
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
        $color = new Color();
        $color->name = $request->name;
        
        if (!empty($request->image)) {
            $color->image = dataUriToImage($request->image, "colors");
        }

        $color->save();

        return redirect(route('admin.color.index'))->with('success', 'Success! New data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        request()->replace($color->toArray());
        request()->flash();

        return view('admin.screens.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $color->name = $request->name;
        if (!empty($request->image)) {
            if ($color->image) {
                unlink(public_path() . "/storage/" . $color->getRawOriginal('image'));
            }
            $color->image = dataUriToImage($request->image, "colors");
        }
        $color->save();

        return redirect(route('admin.color.index'))->with('success', 'Success! New data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        if ($color->image) {
            unlink(public_path() . "/storage/" . $color->getRawOriginal('image'));
        }
        $color->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
