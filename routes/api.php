<?php

use App\Http\Controllers\ApiCategoryController;
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

Route::get('/categories', [ApiCategoryController::class, 'index']);
Route::post('/categories', [ApiCategoryController::class, 'store']);
Route::put('/categories/{category}', [ApiCategoryController::class, 'update']);
Route::delete('/categories/{category}', [ApiCategoryController::class, 'destroy']);
