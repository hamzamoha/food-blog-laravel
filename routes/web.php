<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\StorageController;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
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

Route::get('/', [MainController::class, 'index']);
Route::get('/recipes/{id}', [MainController::class, 'recipe']);
Route::get('/recipes', [MainController::class, 'recipes']);
Route::get('/recipe', [MainController::class, 'recipe']);
Route::get('/article', [MainController::class, 'article']);
Route::get('/articles', [MainController::class, 'articles']);

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
    Route::prefix("ckeditor")->group(function() {
        Route::post('/upload', [StorageController::class, 'ckeditor_upload']);
    });
})->name('api.');

Route::get('/test', function() {
    return Category::withCount("recipes")->find(7)['recipes_count'];
});

