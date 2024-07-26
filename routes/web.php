<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController ::class, 'index']);

Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('/books/{slug}-{book}', [App\Http\Controllers\BookController ::class, 'show'])->name('books.show')->where(['property' => '[0-9]+', 'slug' => '[0-9a-z\-]+']);

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function() {
    Route::resource('book', App\Http\Controllers\Admin\BookController::class);

});

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'dologin']);
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

