<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FiorellaFriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Models\Category;
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
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/fiorella/{friend?}', [FiorellaFriendController::class, 'show']);

Route::get('/a-propos', [AboutController::class, 'index']);
Route::get('/a-propos/{user}', [AboutController::class, 'show']);

// CRUD = Create, Read, Update, Delete pour les catégories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/creer', [CategoryController::class, 'create']);
Route::post('/categories/creer', [CategoryController::class, 'store']);

Route::get('/category-test', function () {
    $category = new Category();
    $category->name = 'Action';
    $category->save();

    return $category;
});

// Movies
Route::get('/films', [MovieController::class, 'index']);
Route::get('/film/{id}', [MovieController::class, 'show']);
Route::get('/films/creer', [MovieController::class, 'create'])->middleware('auth');
Route::post('/films/creer', [MovieController::class, 'store'])->middleware('auth');
Route::get('/film/{movie}/modifier', [MovieController::class, 'edit'])->middleware('auth');
Route::put('/film/{movie}/modifier', [MovieController::class, 'update'])->middleware('auth');
Route::delete('/film/{id}', [MovieController::class, 'destroy'])->middleware('auth');

// Acteurs
Route::get('/acteurs', [ActorController::class, 'index']);
Route::get('/acteur/{actor}', [ActorController::class, 'show'])->name('actors.show');
Route::get('/acteurs/creer', [ActorController::class, 'create'])->middleware('auth');
Route::post('/acteurs/creer', [ActorController::class, 'store'])->middleware('auth');
Route::get('/acteur/{actor}/modifier', [ActorController::class, 'edit'])->middleware('auth');
Route::put('/acteur/{actor}/modifier', [ActorController::class, 'update'])->middleware('auth');
Route::delete('/acteur/{actor}', [ActorController::class, 'destroy'])->middleware('auth');

// Authentification
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::delete('/logout', [LoginController::class, 'destroy']);

// Mon compte
Route::get('/mon-compte', [AccountController::class, 'index'])->middleware('auth');