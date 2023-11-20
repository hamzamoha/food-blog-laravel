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
    
}
