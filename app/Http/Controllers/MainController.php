<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Recipe;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $recipes = Recipe::orderByDesc('id')->paginate(5);
        return view('index', compact("categories", "recipes"));
    }
    public function recipe($slug)
    {
        if (Recipe::where('slug', $slug)->exists())
            return view('recipes.show', [
                'recipe' => Recipe::where('slug', $slug)->first()
            ]);
        return response()->redirectTo('/recipes');
    }
    public function recipes()
    {
        return view('recipes.index', [
            "recipes" => Recipe::paginate(10)
        ]);
    }
    public function article($slug)
    {
        if (Article::where('slug', $slug)->exists())
            return view('articles.show', [
                'article' => Article::where('slug', $slug)->first()
            ]);
        return response()->redirectTo('/articles');
    }
    public function articles()
    {
        return view('articles.index', [
            "articles" => Article::paginate(10)
        ]);
    }
}
