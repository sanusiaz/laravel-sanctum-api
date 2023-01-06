<?php

use App\Http\Controllers\Api\V1\Auth\UserController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\V1'
], function () {
    
    
    Route::middleware(['auth:sanctum'])->post('/products', [ProductController::class, 'store'])
        ->name('products.store');
    Route::middleware(['auth:sanctum'])->post('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');
    Route::middleware(['auth:sanctum'])->delete('/products/{products}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
        
    
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::middleware(['auth:sanctum'])->post('/logout', [UserController::class, 'logout']);

    Route::apiResource('/products', ProductController::class);

    Route::apiResource('/customers', CustomerController::class);
    Route::apiResource('/invoices', InvoiceController::class);
   
});



Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\V1'
], function () {
     // search route
     Route::get('/products/search/{name}', [ProductController::class, 'search'])
     ->whereAlphaNumeric('name');
});