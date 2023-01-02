<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/fhrhjr', function () {
    return Product::create([
        'name' => 'Some name',
        'slug' => 'some_name',
        'description' => 'lefjskfgfldf',
        'price' => 34
    ]);
});


Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\Api\V1'
], function () {
    Route::apiResource('/products', ProductController::class);
});