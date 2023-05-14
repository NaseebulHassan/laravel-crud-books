<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

//Books Record Routes

Route::get('/', [BookController::class, 'index']);
Route::get('/showbooks', [BookController::class, 'show']);
Route::post('/storebooks', [BookController::class, 'store']);
Route::get('/editbooks/{book_id}', [BookController::class, 'edit']);
Route::put('/booksupdate/{book_id}', [BookController::class, 'update']);
Route::delete('/delete-book/{book_id}', [BookController::class, 'destory']);

/// End Books Record Routes