<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $recipes = Recipe::orderByDesc('id')->paginate(8);
        $articles = Article::orderByDesc('id')->paginate(6);
        $featured_recipe = Recipe::inRandomOrder()->first();
        //$popular_recipes = Recipe::inRandomOrder()->take(10)->get(['title', 'image_url', 'slug']);
        $popular_recipes = DB::table("recipes")->leftJoinSub(DB::table("views")->where("views.viewable_table", "=", "recipes"), "views", function (JoinClause $join) {
            $join->on('views.viewable_id', '=', 'recipes.id');
        })->orderByDesc("recipes.id")->orderByDesc("views.views_count")->take(10)->get(['title', 'image_url', 'slug']);
        return view('index', compact("categories", "recipes", "articles", "featured_recipe", "popular_recipes"));
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
            "recipes" => Recipe::paginate(8)
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
            "articles" => Article::paginate(8)
        ]);
    }
}
