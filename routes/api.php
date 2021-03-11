<?php

use App\Http\Controllers\API\{ActivityController, StatisticsController};
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

Route::apiResource('activities', ActivityController::class);//->only('index', 'store');
Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics');
