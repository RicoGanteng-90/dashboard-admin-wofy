<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\OrderAPIController;
use App\Http\Controllers\MessageAPIController;
use App\Http\Controllers\Api\ProductAPIController;
use App\Http\Controllers\CustomerAPIController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;


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

//Authenticating
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout']);

//Products (Mungkin tidak semuanya terpakai/menyesuaikan)
Route::get('/products', [ProductAPIController::class, 'index']);
Route::post('/products-add', [ProductAPIController::class, 'store']);
Route::get('/products/{id}', [ProductAPIController::class, 'show']);

//Search
Route::post('/search', [SearchController::class, 'search']);

//Orders (Mungkin tidak semuanya terpakai/menyesuaikan)
Route::get('/orders', [OrderAPIController::class, 'index']);
Route::get('/orders-show/{customer_id}', [OrderAPIController::class, 'show']);
Route::post('/orders-add', [OrderAPIController::class, 'store']);
Route::put('/orders-image', [OrderAPIController::class, 'update']);
Route::delete('/orders-delete/{id}', [OrderAPIController::class, 'destroy']);

//customer account (Mungkin tidak semuanya terpakai/menyesuaikan)
Route::get('/customer_accounts', [CustomerAPIController::class, 'index']);
Route::get('/customer_accounts/{id}', [CustomerAPIController::class, 'show']);
Route::put('/customer_accounts-update/{id}', [CustomerAPIController::class, 'update']);
Route::delete('/customer_accounts/{id}', [CustomerAPIController::class, 'destroy']);

//message (Mungkin tidak semuanya terpakai/menyesuaikan)
Route::get('/message', [MessageAPIController::class, 'index']);
Route::post('/message-add', [MessageAPIController::class, 'store']);

//cart (Mungkin tidak semuanya terpakai/menyesuaikan)
Route::get('/cart/{customer_id}', [CartController::class, 'index']);
Route::post('/cart-add', [CartController::class, 'store']);
Route::post('/cart-delete/{id}', [CartController::class, 'destroy']);
Route::post('/cart-find/{id}', [CartController::class, 'show']);



