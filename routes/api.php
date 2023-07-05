<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
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
Route::get('clients', [ClientController::class, 'index']);
Route::post('clients', [ClientController::class, 'add']);

Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'add']);
Route::get('products/{id}', [ProductController::class, 'getOne']);
Route::get('products/{id}/update', [ProductController::class, 'getOne']);
Route::put('products/{id}/update', [ProductController::class, 'update']);
Route::delete('products/{id}/delete', [ProductController::class, 'delete']);

Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories', [CategoryController::class, 'add']);
