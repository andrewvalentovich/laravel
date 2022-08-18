<?php

use App\Http\Controllers\Article\CreateController;
use App\Http\Controllers\Article\DestroyController;
use App\Http\Controllers\Article\EditController;
use App\Http\Controllers\Article\IndexController;
use App\Http\Controllers\Article\ShowController;
use App\Http\Controllers\Article\StoreController;
use App\Http\Controllers\Article\UpdateController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});


Route::group([

    'namespace' => 'Article',
    'middleware' => 'jwt.auth'

], function () {
    Route::get('/articles', [IndexController::class, '__invoke']);
});


Route::group([

    'namespace' => 'Article',
    'middleware' => 'jwt.auth',

], function () {

    Route::get('/articles/', [IndexController::class, '__invoke']);
    Route::get('/articles/create', [CreateController::class, '__invoke']);
    Route::post('/articles/', [StoreController::class, '__invoke']);
    Route::get('/articles/{article}', [ShowController::class, '__invoke']);
    Route::get('/articles/{article}/edit', [EditController::class, '__invoke']);
    Route::put('/articles/{article}', [UpdateController::class, '__invoke']);
    Route::patch('/articles/{article}', [UpdateController::class, '__invoke']);
    Route::delete('/articles/{article}', [DestroyController::class, '__invoke']);

});
