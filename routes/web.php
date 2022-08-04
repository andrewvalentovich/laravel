<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MainController;
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
    Route::get('/update', [ArtcleController::class, 'update']);
    Route::get('/delete', [ArtcleController::class, 'delete']);
    Route::get('/first_or_create', [ArtcleController::class, 'firstOrCreate']);
    Route::get('/update_or_create', [ArtcleController::class, 'updateOrCreate']);
});

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
