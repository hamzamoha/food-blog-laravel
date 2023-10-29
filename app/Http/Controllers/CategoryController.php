<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::withCount("recipes")->get());
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
        $validated = $request->validate([
            'label' => 'required',
            'description' => 'required',
            'image' => ['required', File::image()],
        ]);
        $image = $request->file('image');
        $category = Category::create([
            "label" => Str::title($request->input("label")),
            "slug" => Str::slug($request->input("label")),
            "description" => Str::squish($request->input("description")),
            "image_url" => ""
        ]);
        $category->image_url = $image->storeAs("uploads", $category->slug . "-" . $category->id . "." . $image->getClientOriginalExtension());
        $category->save();
        return redirect("/admin")->withFragment("#/categories/recipes");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $category = Category::find($id);
        $category->label = Str::title($request->input("label"));
        $category->slug = Str::slug($request->input("label"));
        $category->description = Str::squish($request->input("description"));
        if ($request->hasFile("image")) {
            $image = $request->file('image');
            $category->image_url = $image->storeAs("uploads", $category->slug . "-" . $category->id . "." . $image->getClientOriginalExtension());
        }
        $category->save();
        return redirect("/admin")->withFragment("#/categories/recipes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);
        if(Recipe::where("category_id", $id)->count() === 0) {
            Storage::delete($category->image_url);
            $category->delete();
        }
        return redirect("/admin")->withFragment("#/categories/recipes");
    }
}
