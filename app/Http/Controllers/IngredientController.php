<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return json_encode(Ingredient::withCount("recipes")->get());
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
            'name' => 'required',
            'category' => 'required',
            'image' => ['required', File::image()],
        ]);
        $image = $request->file('image');
        $ingredient = Ingredient::create([
            "name" => Str::title($request->input("name")),
            "image_url" => "",
            "category" => Str::lower($request->input("category")),
        ]);
        $ingredient->image_url = "/" . $image->storeAs("uploads", "ingredient-" . Str::slug($ingredient->name) . "-" . $ingredient->id . "." . $image->getClientOriginalExtension());
        $ingredient->save();
        return redirect("/admin")->withFragment("#/ingredients/");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->name = Str::title($request->input("name"));
        $ingredient->category = Str::squish($request->input("category"));
        if ($request->hasFile("image")) {
            $request->validate(["image" => [File::image()]]);
            $image = $request->file('image');
            $ingredient->image_url = "/" . $image->storeAs("uploads", "ingredient-" . Str::slug($ingredient->name) . "-" . $ingredient->id . "." . $image->getClientOriginalExtension());
        }
        $ingredient->save();
        return redirect("/admin")->withFragment("#/ingredients");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }
}
