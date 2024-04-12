<?php

namespace App\Http\Controllers;

use App\Models\Hsn;
use Illuminate\Http\Request;

class HsnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        request()->flush();

        $hsns = Hsn::latest()->paginate(10);
        return view('admin.screens.hsn.index', compact('hsns'));
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
        $hsn = new Hsn();
        $hsn->code = $request->code;
        $hsn->gst = $request->gst;
        $hsn->save();

        return redirect(route('admin.hsn.index'))->with('success', 'Success! New data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hsn $hsn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hsn $hsn)
    {
        request()->replace($hsn->toArray());
        request()->flash();

        return view('admin.screens.hsn.edit', compact('hsn'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hsn $hsn)
    {
        $hsn->code = $request->code;
        $hsn->gst = $request->gst;
        $hsn->save();

        return redirect(route('admin.hsn.index'))->with('success', 'Success! New data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hsn $hsn)
    {
        $hsn->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }
}
