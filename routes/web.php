<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtcleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArtcleController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArtcleController::class, 'create'])->name('articles.create');
    Route::post('/', [ArtcleController::class, 'store'])->name('articles.store');
    Route::get('/{article}', [ArtcleController::class, 'show'])->name('articles.show');
    Route::get('/{article}/edit', [ArtcleController::class, 'edit'])->name('articles.edit');
    Route::put('/{article}', [ArtcleController::class, 'update'])->name('articles.update');
    Route::delete('/{article}', [ArtcleController::class, 'destroy'])->name('articles.delete');

    Route::get('/delete', [ArtcleController::class, 'delete']);
    Route::get('/first_or_create', [ArtcleController::class, 'firstOrCreate']);
    Route::get('/update_or_create', [ArtcleController::class, 'updateOrCreate']);
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', [TagController::class, 'index'])->name('tags.index');
});

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
