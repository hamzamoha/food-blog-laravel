<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $recipes = Recipe::orderByDesc('id')->paginate(5);
        return view('index', compact("categories", "recipes"));
    }
    public function recipe() {
        return view('recipes.show');
    }
    public function recipes() {
        return view('recipes.index');
    }
    public function article() {
        return view('articles.show');
    }
    public function articles() {
        return view('articles.index');
    }

}
