<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/addProductInCart', [ProductController::class, 'addProductInCart']);
    Route::delete('/removeProductFromCart', [ProductController::class, 'removeProductFromCart']);
    Route::put('/setCartProductQuantity', [ProductController::class, 'setCartProductQuantity']);
    Route::get('/getUserCart', [ProductController::class, 'getUserCart']);    
});
