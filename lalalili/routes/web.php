<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

// Autentikasi admin
Route::get('/admin/login', [AdminController::class, 'showLogin']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/register', [AdminController::class, 'showRegister']);
Route::post('/admin/register', [AdminController::class, 'register']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

// CRUD produk (hanya bisa diakses setelah login)
Route::get('/', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProductController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProductController::class, 'store'])->name('produk.store');
Route::get('/produk/edit/{id}', [ProductController::class, 'edit'])->name('produk.edit');
Route::post('/produk/update/{id}', [ProductController::class, 'update'])->name('produk.update');
Route::get('/produk/delete/{id}', [ProductController::class, 'delete'])->name('produk.delete');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

