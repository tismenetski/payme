<?php

use App\Http\Controllers\SalesController;
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

// Controller Group for handling sales requests
Route::controller(SalesController::class)->prefix('sales')->group(function (){
    Route::post('/generate_sale','generate_sale')->name('generateSale');
    Route::post('/store_sale','store_sale')->name('storeSale');
    Route::get('/get_all_sales','get_all_sales')->name('getAllSales');
});
