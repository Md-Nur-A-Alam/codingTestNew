<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ModelsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.app');
// });
Route::get('/', [BrandController::class,'index'])->name('brands.index');

Route::get('/models', [ModelsController::class,'index'])->name('models.index');

Route::get('/items', [ItemController::class,'index'])->name('items.index');