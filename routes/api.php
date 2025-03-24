<?php

use App\Http\Controllers\clienteController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\transactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\bookController;


//APIS PARA BOOK

Route::get('/book', [bookController::class, 'index']);

Route::get('/book/{id}', [bookController::class, 'show']);

Route::post('/book', [bookController::class,'store']);

Route::get('/books/search', [BookController::class, 'search']);

//APIS PARAA CLIENT
Route::get('/client', [clienteController::class,'index']);

Route::get('/client/{id}', [clienteController::class,'show']);

Route::post('/client', [clienteController::class,'store']);

//APIS PARA ORDER

Route::get('/order', [orderController::class,'index']);

Route::post('/order', [orderController::class,'store']);


//APIS para las transacciones
Route::post('/ordertrans', [transactionController::class,'registerOrder']);



