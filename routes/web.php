<?php

use App\Models\Product;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductsController;


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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('products', [ProductsController::class, 'index'])->name(('products.index'));

    Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');

    Route::post('products/store', [ProductsController::class, 'store'])->name('products.store');

    Route::delete('products/{id}', [ProductsController::class, 'delete'])->name('products.destroy');

    Route::get('products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');

    Route::put('products/{id}', [ProductsController::class, 'update'])->name('products.update');
});

require __DIR__ . '/auth.php';
