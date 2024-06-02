<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Validator;

Route::get('/', function () {
    return view('product/index');
});

//Posts endpoint
Route::resource('/product','App\Http\Controllers\ProductController');
// returns the home page with all posts
Route::get('/', ProductController::class .'@index')->name('product.index');
// returns the form for adding a post
Route::get('/product/createProduct', [ProductController::class . '@create']);
// adds a post to the database
Route::post('/product', ProductController::class .'@store')->name('product.store');
// returns a page that shows a full post
Route::get('/product/{data}', [ProductController::class .'@show'])->name('product.show');
// returns the form for editing a post
Route::get('/product/{data}/editProduct', ProductController::class .'@edit')->name('product.edit');
// updates a post
Route::put('/product/{data}', [ProductController::class .'@update'])->name('product.update');
// deletes a post
Route::delete('/product/{data}', [ProductController::class .'@destroy'])->name('product.destroy');
// search for specified posts
Route::get('/search', ProductController::class .'@search')->name('product.search');