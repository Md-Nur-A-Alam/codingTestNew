<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ModelsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.app');
// });
Route::get('/', [BrandController::class, 'index'])->name('brands.index');
Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

Route::get('/models', [ModelsController::class, 'index'])->name('models.index');
Route::post('/models', [ModelsController::class, 'store'])->name('models.store');
Route::put('/models/{id}', [ModelsController::class, 'update'])->name('models.update');
Route::delete('/models/{id}', [ModelsController::class, 'destroy'])->name('models.destroy');

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
