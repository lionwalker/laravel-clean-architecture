<?php

use App\Http\Controllers\Api\V1\Posts\IndexController;
use App\Http\Controllers\Api\V1\Posts\ShowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('posts')->as('posts:')->group(function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('{post:key}', ShowController::class)->name('show');
});
