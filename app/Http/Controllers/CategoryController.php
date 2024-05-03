<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    protected function genSlug($name, $id = null)
    {
        $slug = Str::slug($name, '-');
        $query = Category::where('slug', 'LIKE', '%' . $slug . '%');

        if ($id) {
            $query->whereNot('id', $id);
        }

        $count = $query->count();


        if ($count) $slug .= '-' . ($count - 1);

        return $slug;
    }

    public function subcategory()
    {
        $categories = Category::where('category_id', request()->id)->orderBy('name')->pluck('name', 'id');
        return response()->json($categories);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit = request('limit') ?: 10;
        $type = request('type') ?: 'default';
        $query = Category::query();

        if ($type === 'trash') {
            $query->onlyTrashed();
        }

        $categories = $query->latest()->paginate($limit);

        return view('admin.screens.category.index', compact('categories', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        request()->flush();

        $parents = Category::orderBy('name')->pluck('name', 'id');
        return view('admin.screens.category.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug ?? $this->genSlug($request->name);
        $category->category_id = $request->category_id;
        $category->description = $request->description;
        if (!empty($request->image)) {
            $category->image = dataUriToImage($request->image, "categories");
        }
        $category->seo_title = $request->seo_title;
        $category->seo_keywords = $request->seo_keywords;
        $category->seo_description = $request->seo_description;
        $category->save();

        return redirect(route('admin.category.index'))->with('success', 'Success! New data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        request()->replace($category->toArray());
        request()->flash();

        $parents = Category::where('category_id', $category->id)->orderBy('name')->pluck('name', 'id');
        return view('admin.screens.category.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug = $request->slug ?? $this->genSlug($request->name, $category->id);
        $category->category_id = $request->category_id;
        $category->description = $request->description;
        if (!empty($request->image)) {
            if ($category->image) {
                unlink(public_path() . "/storage/" . $category->getRawOriginal('image'));
            }
            $category->image = dataUriToImage($request->image, "categories");
        }
        $category->seo_title = $request->seo_title;
        $category->seo_keywords = $request->seo_keywords;
        $category->seo_description = $request->seo_description;
        $category->save();

        return redirect(route('admin.category.index'))->with('success', 'Success! New data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Success! A data has been deleted.');
    }

    public function deletePermanent($category)
    {
        $category = Category::onlyTrashed()->find($category);

        if ($category->image) {
            unlink(public_path() . "/storage/" . $category->getRawOriginal('image'));
            // Storage::delete($category->getRawOriginal('image'));
        }

        $category->forceDelete();

        return redirect()->back()->with('success', 'Success! A data has been deleted from trash.');
    }

    public function restore($category)
    {
        $category = Category::onlyTrashed()->where('slug', $category)->firstOrFail();

        $category->restore();

        return redirect(route('admin.category.index'))->with('success', 'Success! A data has been restored from trash.');
    }
}
