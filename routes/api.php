<?php

use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\V1'
], function () {
    Route::apiResource('/products', ProductController::class);

    // search route
    Route::get('/products/search/{name}', [ProductController::class, 'search'])
        ->whereAlpha('name');
});