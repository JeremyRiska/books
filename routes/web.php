<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BooksController::class, 'index'])->name('index');
// Route::get('/autocomplete-search', [BooksController::class], 'autocompleteSearch');
Route::get('/autocomplete-search', 'App\Http\Controllers\BooksController@autocompleteSearch')->name('authors-autocomplete');
Route::post('/', [BooksController::class, 'store'])->name('add-book');
Route::get('/books-json', [BooksController::class, 'booksJson'])->name('books-json');