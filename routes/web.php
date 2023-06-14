<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use Illuminate\Contracts\Session\Session;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Authentication session
Route::get('/', [SessionController::class, 'index'])->name('session.index');
Route::post('/', [SessionController::class, 'store'])->name('session.store');
Route::post('/register', [SessionController::class, 'create'])->name('session.create');
Route::post('/logout', [SessionController::class, 'destroy'])->name('session.destroy');
Route::get('/error', [SessionController::class, 'show'])->name('session.show');
Route::get('/register-show', [SessionController::class, 'edit'])->name('session.edit');

//Home session
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

//Admin profile session
Route::get('/profile-index', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');;
Route::get('/profile-show', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');;
Route::middleware('auth')->post('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
Route::middleware('auth')->delete('/profile-delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::middleware('auth')->post('/password-edit', [ProfileController::class, 'edit'])->name('profile.edit');

//Product session
Route::get('/product-index', [ProductController::class, 'index'])->name('product.index')->middleware('auth');
Route::get('/product-show/{id}', [ProductController::class, 'show'])->name('product.show')->middleware('auth');;
Route::post('/product-add', [ProductController::class, 'store'])->name('product.store')->middleware('auth');
Route::post('/product-update', [ProductController::class, 'update'])->name('product.update')->middleware('auth');
Route::delete('/product-delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

