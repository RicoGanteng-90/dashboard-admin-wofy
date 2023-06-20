<?php

use App\Http\Controllers\Api\KeranjangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\OrderAPIController;
use App\Http\Controllers\Api\MessageAPIController;
use App\Http\Controllers\Api\ProductAPIController;
use App\Http\Controllers\Api\CustomerAPIController;
use App\Http\Controllers\Api\SearchApiController;
use App\Http\Controllers\Api\CartController;


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
Route::post('/login', [LoginApiController::class, 'login']);
Route::post('/register', [LoginApiController::class, 'register']);
Route::post('/logout', [LoginApiController::class, 'logout']);

//Products (Mungkin t   idak semuanya terpakai/menyesuaikan)
Route::get('/products', [ProductAPIController::class, 'index']);
Route::post('/products-add', [ProductAPIController::class, 'store']);
Route::get('/products/{id}', [ProductAPIController::class, 'show']);
Route::get('/products/category/{category}',[ProductAPIController::class,'getByCategory']);
Route::get('/products/search/{name}',[ProductAPIController::class,'getProdukByName']);

Route::post('/keranjangtambah', [KeranjangController::class, 'tambahKeranjang']);
Route::put('/keranjangupdate', [KeranjangController::class, 'updates']);
Route::get('/keranjang/{customer_id}', [KeranjangController::class, 'keranjangByUser']);
Route::delete('/keranjang_hapus/{id}', [KeranjangController::class, 'deleteKeranjang']);

//Searchda
Route::get('/search/{name}', [SearchApiController::class, 'search']);

//Orders (Mungkin tidak semuanya terpakai/menyesuaikan)
Route::get('/orders', [OrderAPIController::class, 'index']);
Route::get('/orders-show/{customer_id}', [OrderAPIController::class, 'show']);
Route::post('/orders-add', [OrderAPIController::class, 'store']);
Route::put('/orders-image', [OrderAPIController::class, 'update']);
Route::post('/oderuploadtransaksi', [OrderAPIController::class, 'updateDeleteOrder']);


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
Route::post('/cart-add', [CartController::class, 'store']);
Route::get('/cart/{customer_id}', [CartController::class, 'index']);
Route::post('/cart-add', [CartController::class, 'store']);
Route::post('/cart-delete/{id}', [CartController::class, 'destroy']);
Route::post('/cart-find/{id}', [CartController::class, 'show']);