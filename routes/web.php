<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', function () {
    $data1 = 'Impressum - Internet Store';
    $data2 = 'Impressum';
    $description = 'This is an impressum page ...';
    $author = 'Developed by: Niemand';

    return view('home.about')->with('title', $data1)
        ->with('subtitle', $data2)
        ->with('description', $description)
        ->with('author', $author);
})->name('home.about');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
