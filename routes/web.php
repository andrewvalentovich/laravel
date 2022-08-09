<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Article\CreateController;
use App\Http\Controllers\Article\DestroyController;
use App\Http\Controllers\Article\EditController;
use App\Http\Controllers\Article\IndexController;
use App\Http\Controllers\Article\ShowController;
use App\Http\Controllers\Article\StoreController;
use App\Http\Controllers\Article\UpdateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'articles', 'namespace' => 'Article'], function () {
    Route::get('/', [IndexController::class, '__invoke'])->name('articles.index');
    Route::get('/create', [CreateController::class, '__invoke'])->name('articles.create');
    Route::post('/', [StoreController::class, '__invoke'])->name('articles.store');
    Route::get('/{article}', [ShowController::class, '__invoke'])->name('articles.show');
    Route::get('/{article}/edit', [EditController::class, '__invoke'])->name('articles.edit');
    Route::put('/{article}', [UpdateController::class, '__invoke'])->name('articles.update');
    Route::delete('/{article}', [DestroyController::class, '__invoke'])->name('articles.delete');
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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['namespace' => 'Article'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Article\IndexController::class, '__invoke'])->name('admin.article.index');
    });
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', [TagController::class, 'index'])->name('tags.index');
});

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
