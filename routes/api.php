<?php

use App\Http\Controllers\Api\V1\Auth\UserController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\FallbackController;
use App\Http\Controllers\Api\V1\InvoiceController;
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
        
    
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::middleware(['auth:sanctum'])->post('/logout', [UserController::class, 'logout']);

    Route::apiResource('/products', ProductController::class);

    Route::middleware(['auth:sanctum'])->post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::middleware(['auth:sanctum'])->post('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::middleware(['auth:sanctum'])->delete('/products/{products}', [ProductController::class, 'destroy'])
        ->name('products.destroy');


   

    Route::middleware(['auth:sanctum'])->delete('/invoices/{invoices}', [InvoiceController::class, 'destroy'])
        ->name('invoices.destroy');
        
    Route::apiResource('/customers', CustomerController::class);
    Route::apiResource('/invoices', InvoiceController::class);

    Route::middleware(['auth:sanctum'])->post('/customers', [CustomerController::class, 'store'])
        ->name('customers.store');
        
    Route::middleware(['auth:sanctum'])->post('/invoices', [InvoiceController::class, 'store'])
        ->name('invoices.store');


    Route::middleware(['auth:sanctum'])->match(['PUT', 'PATCH'], '/invoices/{invoices}', [InvoiceController::class, 'update'])
        ->name('invoices.update');
   
});

Route::fallback(FallbackController::class);



Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\V1'
], function () {
     // search route
     Route::get('/products/search/{name}', [ProductController::class, 'search'])
     ->whereAlphaNumeric('name');
});

// bulk insert invoices 
Route::post('/invoices/bulk/store', [InvoiceController::class, 'bulkStore']);