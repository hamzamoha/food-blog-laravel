<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\StorageController;
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

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/uploads/{url}', [StorageController::class, 'uploads']);

Route::prefix('api')->group(function () {
    Route::prefix('recipes')->group(function () {
        Route::controller(RecipeController::class)->group(function () {
            Route::get('/', 'index')->name("index");
            Route::post('/', 'store');
        });
        Route::prefix("categories")->controller(CategoryController::class)->group(function () {
            Route::get('/', 'index')->name("index");
            Route::post('/', 'store');
            Route::put('/{id}', 'update');
            Route::delete('/{id}', 'destroy');
        })->name("categories.");
    })->name("recipes.");
    Route::prefix("ingredients")->controller(IngredientController::class)->group(function () {
        Route::get('/', 'index')->name("index");
        Route::post('/', 'store');
    })->name("ingredients.");
})->name('api.');

Route::get('/test', function() {
    return "done";
});

