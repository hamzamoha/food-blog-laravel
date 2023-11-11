<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\UserController;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
https://claudiastable.com/wp-json/wp/v2/wprm_recipe?wprm_course=18&per_page=100
*/

Route::name("auth.")->controller(UserController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get("/login", 'login')->name("login");
        Route::post("/login", 'postLogin');
        Route::get("/register", 'register')->name("register");
        Route::post("/register", 'store');
    });
    Route::middleware('auth')->group(function () {
        Route::post("/logout", 'logout')->name("logout");
        Route::get("/profile", 'profile')->name("profile");
    });
});

Route::get('/', [MainController::class, 'index']);
Route::get('/recipes/{slug}', [MainController::class, 'recipe']);
Route::get('/recipes', [MainController::class, 'recipes']);
Route::get('/articles', [MainController::class, 'articles']);
Route::get('/articles/{slug}', [MainController::class, 'article']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/uploads/{url}', [StorageController::class, 'uploads']);
Route::get('/ckeditor/{url}', [StorageController::class, 'ckeditor']);

Route::prefix('api')->group(function () {
    Route::prefix('recipes')->group(function () {
        Route::controller(RecipeController::class)->group(function () {
            Route::get('/', 'index')->name("index");
            Route::post('/', 'store');
        });
        Route::prefix("categories")->controller(CategoryController::class)->group(function () {
            Route::get('/', '_index')->name("index");
            Route::post('/', '_store');
            Route::put('/{id}', 'update');
            Route::delete('/{id}', '_destroy');
        })->name("categories.");
    })->name("recipes.");
    Route::prefix("ingredients")->controller(IngredientController::class)->group(function () {
        Route::get('/', 'index')->name("index");
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    })->name("ingredients.");
    Route::prefix("articles")->group(function () {
        Route::controller(ArticleController::class)->group(function () {
            Route::get('/', 'index')->name("index");
            Route::post('/', 'store');
        });
        Route::prefix("categories")->controller(CategoryController::class)->group(function () {
            Route::get('/', 'index_')->name("index");
            Route::post('/', 'store_');
            Route::put('/{id}', 'update');
            Route::delete('/{id}', 'destroy_');
        })->name("categories.");
    })->name("articles.");
    Route::prefix("ckeditor")->group(function () {
        Route::post('/upload', [StorageController::class, 'ckeditor_upload']);
    });
})->name('api.');

Route::get('/test', function () {
    exit(0);
    $recipes = Recipe::paginate(5);
    foreach ($recipes as $recipe) {
        $url = "https://source.unsplash.com/collection/1424340/1920x1080?sig=" . $recipe->id;
        file_put_contents("temp.jpg", file_get_contents($url));
        shell_exec("ffmpeg -i temp.jpg -vf scale=1080:-1 ../storage/app" . $recipe->image_url);
    }
    unlink("temp.jpg");
    exit(0);
    $json = json_decode(file_get_contents("../app/Http/Controllers/recipes.json"));
    foreach ($json as $rec) {
        $recipe = Recipe::create([
            "title" => \Illuminate\Support\Str::title($rec->title),
            "slug" => \Illuminate\Support\Str::slug($rec->title),
            "description" => $rec->description,
            "cooking_time" => $rec->cooking_time,
            "difficulty_level" => $rec->difficulty_level,
            "cooking_method" => $rec->cooking_method,
            "serving_size" => $rec->serving_size,
            "image_url" => '',
            "tags" => implode(",", $rec->tags),
        ]);
        foreach ($rec->ingredients as $ingredient_id) {
            \Illuminate\Support\Facades\DB::table("recipes_ingredients")->insert([
                "ingredient_id" => $ingredient_id,
                "recipe_id" => $recipe->id
            ]);
        }
        foreach ($rec->categories as $category_id) {
            \Illuminate\Support\Facades\DB::table("recipes_categories")->insert([
                "category_id" => $category_id,
                "recipe_id" => $recipe->id
            ]);
        }
        $recipe->image_url = "/uploads/recipe-" . $recipe->slug . "-" . $recipe->id . ".jpg";
        $recipe->save();
    }
});
