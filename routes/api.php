<?php

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

Route::post('/register', 'App\Http\Controllers\API\AuthController@register');
Route::post('/login', 'App\Http\Controllers\API\AuthController@login');

Route::apiResource('/houses', 'App\Http\Controllers\API\HouseController')->middleware('auth:api');
Route::apiResource('/housemembers', 'App\Http\Controllers\API\HouseMemberController')->middleware('auth:api');

Route::apiResource('/reminders', 'App\Http\Controllers\API\ReminderController')->middleware('auth:api');

Route::apiResource('/transactions', 'App\Http\Controllers\API\TransactionController')->middleware('auth:api');
Route::apiResource('/categories', 'App\Http\Controllers\API\CategoryController')->middleware('auth:api');
Route::apiResource('/subcategories', 'App\Http\Controllers\API\SubCategoryController')->middleware('auth:api');
