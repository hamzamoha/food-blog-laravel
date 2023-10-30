<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\StorageController;
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


Route::post('/admin/recipes/category', [CategoryController::class, 'store']);
Route::put('/admin/recipes/category/{id}', [CategoryController::class, 'update']);
Route::delete('/admin/recipes/category/{id}', [CategoryController::class, 'destroy']);
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/uploads/{url}', [StorageController::class, 'uploads']);

Route::get('/api/recipes', [RecipeController::class, 'index']);
Route::get('/api/categories', [CategoryController::class, 'index']);
Route::get('/api/ingredients', [IngredientController::class, 'index']);
