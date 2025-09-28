<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Converting the model into JSON with ALL of its parameters (created_at and
// updated_at, etc.), which is not ideal.o
Route::get('/products', 'App\Http\Controllers\Api\ProductApiController@index')->name('api.product.index');
Route::get('/products/{id}', 'App\Http\Controllers\Api\ProductApiController@show')->name('api.product.show');

// New version that uses the Resource and Collection facilities from Eloquent so
// that we may choose which parameters to include. Nicer.
Route::prefix('v2')->group(function () {
    Route::get('products', 'App\Http\Controllers\Api\ProductApiControllerV2@index')->name('api.v2.product.index');
    Route::get('products/{id}', 'App\Http\Controllers\Api\ProductApiControllerV2@show')->name('api.v2.product.show');
});

// We add in pagination and remove the endpoint for each individual product.
Route::prefix('v3')->group(function () {
    Route::get('products', 'App\Http\Controllers\Api\ProductApiControllerV3@index')->name('api.v3.product.index');
    Route::get('products/paginate', 'App\Http\Controllers\Api\ProductApiControllerV3@paginate')->name('api.v3.product.paginate');
});
