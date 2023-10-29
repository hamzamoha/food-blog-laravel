<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $recipes = Recipe::paginate(5);
        return view('index', compact("categories", "recipes"));
    }
}
