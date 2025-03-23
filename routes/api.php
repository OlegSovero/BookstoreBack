<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\bookController;

Route::get('/book', [bookController::class, 'index']);

Route::get('/book/{id}', [bookController::class, 'show']);

Route::post('/book', [bookController::class,'store']);

Route::get('/books/search', [BookController::class, 'search']);