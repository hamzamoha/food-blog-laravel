<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view("admin.index");
    }
    public function dashboard() {
        $recipes_count = Recipe::count();
        $articles_count = Article::count();
        $data = [
            //
            "recipes_count" => $recipes_count,
            "articles_count" => $articles_count,
            "posts_count" => $articles_count + $recipes_count,
            "website_views" => DB::table("views")->where("viewable_table", "*")->orderByDesc("id")->take(10)->get(),
            "most_viewed_recipes" => DB::table("views")->where("viewable_table", "recipes")->join("recipes", "viewable_id", "=", "recipes.id")->orderByDesc("views_count")->take(5)->get(),
            "most_viewed_articles" => DB::table("views")->where("viewable_table", "articles")->join("articles", "viewable_id", "=", "articles.id")->orderByDesc("views_count")->take(5)->get(),
            "top_rated_recipes" => DB::table("rating")->join("recipes", "recipe_id", "=", "recipes.id")->selectRaw('recipes.id, title, slug, recipe_id, avg(rating.value) as rating_avg')->groupByRaw("recipes.id, title, slug, recipe_id")->orderByDesc("rating_avg")->take(5)->get(), //
        ];
        return response()->json($data);
    }
}
