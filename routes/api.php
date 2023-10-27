<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Book crud :-

Route::get('/books',[ApiBookController::class,'index']);
Route::get('/books/show/{id}',[ApiBookController::class,'show']);
Route::post('/books/store',[ ApiBookController::class, 'store' ])->middleware('IsApiUser');
Route::post('/books/update/{id}',[ApiBookController::class, 'update'])->middleware('IsApiUser');
Route::get('books/delete/{id}',[ApiBookController::class,'delete'])->middleware('IsApiUser');

// User Crud

Route::post('/handleRegister',[ApiAuthController::class,'handleRegister']);
Route::post('/handleLogin',[ApiAuthController::class,'handleLogin']);
Route::post('/logout',[ApiAuthController::class,'logout']);
