<?php

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
    Route::get('/', [ArtcleController::class, 'index']);
    Route::get('/create/', [ArtcleController::class, 'create']);
    Route::get('/update/', [ArtcleController::class, 'update']);
    Route::get('/delete/', [ArtcleController::class, 'delete']);
    Route::get('/first_or_create', [ArtcleController::class, 'firstOrCreate']);
    Route::get('/update_or_create', [ArtcleController::class, 'updateOrCreate']);
});
