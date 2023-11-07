<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Recipe::with("categories")->get());
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
        $recipe = Recipe::create([
            "title" => Str::title($request->input("title", "")),
            "slug" => Str::slug($request->input("title", "")),
            "description" => trim($request->input("description", "")),
            "cooking_time" => intval($request->input("cooking_time", "15")),
            "difficulty_level" => Str::lower($request->input("difficulty_level", "medium")),
            "cooking_method" => Str::lower(trim($request->input("cooking_method", ""))),
            "serving_size" => intval($request->input("serving_size", "1")),
            "tags" => Str::lower(trim($request->input("tags", ""))),
            "image_url" => '',
        ]);
        foreach (explode(",", $request->input("categories")) as $id) {
            if (($category = Category::find($id)) && $category->for === "recipes")
                DB::table("recipes_categories")->insert([
                    "category_id" => $id,
                    "recipe_id" => $recipe->id
                ]);
        }
        foreach (explode(",", $request->input("ingredients")) as $id) {
            DB::table("recipes_ingredients")->insert([
                "ingredient_id" => $id,
                "recipe_id" => $recipe->id
            ]);
        }
        DB::table("recipes_contents")->insert([
            "recipe_id" => $recipe->id,
            "content" => (new HTMLPurifier(HTMLPurifier_Config::createDefault()))->purify($request->input("content"))
        ]);
        $recipe->image_url = "/" . $request->file('image')->storeAs("uploads", "recipe-" . $recipe->slug . "-" . $recipe->id . "." . $request->file('image')->getClientOriginalExtension());
        $recipe->save();
        return redirect("/admin")->withFragment("#/recipes");
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
