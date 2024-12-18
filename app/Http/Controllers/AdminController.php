<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        // Apply middleware only to specific methods
        $this->middleware('auth:admin')->only(['dashboard']);
    }
    public function index()
    {
        if (auth('admin')->check())
            return view("admin.index");
        else return view("admin.login");
    }
    public function dashboard()
    {
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

    public function login(Request $request) {
        $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);
        if (auth("admin")->attempt(["email" => $request->input("email"), "password" => $request->input("password")], $request->input("remember"))) return response()->redirectToRoute("admin");
        else return back()->withErrors(["error" => "Username or password is not correct !"])->withInput();
    }

    public function logout(Request $request) {
        auth("admin")->logout();
        return response()->redirectToRoute("admin");
    }
}
