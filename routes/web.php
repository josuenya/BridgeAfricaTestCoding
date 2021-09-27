<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers;

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
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //dashboard
    Route::get('dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard');

    //products  
    Route::get('products', [Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('/product/create',[Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store',[Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [Controllers\ProductController::class, 'edit']);
    Route::patch('/product/update/{id}', [Controllers\ProductController::class, 'update']);
    Route::get('/product/delete/{id}', [Controllers\ProductController::class, 'destroy']);

}); 
