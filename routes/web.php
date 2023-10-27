<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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




Route::group(['middleware' => 'SetLang'], function () {


    Route::get('/',[ BookController::class, 'welcome' ])->name('welcome');
// Books: read
    Route::get('/books/search',[ BookController::class, 'search' ])->name('books.search') ;
    Route::get('/books/show/{id}',[ BookController::class, 'show' ])->name('books.show') ;

    // Books: Create
    Route::get('/books/create',[ BookController::class, 'create' ])->name('books.create')->middleware('IsLogin');
    Route::post('/books/store',[ BookController::class, 'store' ])->name('books.store')->middleware('IsLogin');

    //Books: Edit
    Route::get('/books/edit/{id}'     ,[ BookController::class, 'edit' ])->name('books.edit')->middleware('IsLogin') ;
    Route::post('books/update/{id}',[BookController::class, 'update'])->name('books.update')->middleware('IsLogin');

    //Books: Delete
    Route::get('books/delete/{id}',[BookController::class,'delete'])->name('books.delete')->middleware('IsLoginAdmin');

//Categories

//Category: read
Route::get('/category',[ CategoryController::class, 'index' ])->name('category.index') ;
Route::get('/category/show/{id}',[CategoryController::class,'show'])->name('category.show');

//catgory: create
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create')->middleware('IsLogin');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store')->middleware('IsLogin');

//category: edit
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])-> name('category.edit')->middleware('IsLogin');
Route::post('/category/update/{id}',[CategoryController::class,'update'])-> name('category.update')->middleware('IsLogin');

//category:delete
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete')->middleware('IsLoginAdmin');



//registration

Route::get('/register', [AuthController::class,'register'])-> name('auth.register')->middleware('IsGuest');
Route::post('/handle-register', [AuthController::class,'handleRegister'])-> name('auth.handleRegister')->middleware('IsGuest');


//Login

Route::get('/login', [AuthController::class,'login'])-> name('auth.login')->middleware('IsGuest');
Route::post('/handle-login', [AuthController::class,'handleLogin'])-> name('auth.handleLogin')->middleware('IsGuest');

//Logout

Route::get('/logout', [AuthController::class,'logout'])-> name('auth.logout')->middleware('IsLogin');


//Notes: Create

Route::get('/notes/create',[ NoteController::class, 'create' ])->name('notes.create')->middleware('IsLogin'); ;
Route::post('/notes/store',[ NoteController::class, 'store' ])->name('notes.store')->middleware('IsLogin');


Route::get('/login/github',[AuthController::class,'redirectToProvider'])->name('auth.github.redirect');


Route::get('/login/github/callback',[AuthController::class,'handleProviderCallback'])->name('auth.github.callback');

// Language

Route::get('/lang/ar',[LangController::class,'ar'])->name('lang.ar');
Route::get('/lang/en',[LangController::class,'en'])->name('lang.en');






});