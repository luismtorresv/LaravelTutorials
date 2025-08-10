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
