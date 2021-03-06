<?php

use App\Http\Controllers\API\HandphoneController;
use App\Http\Controllers\API\ProviderController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('handphone', HandphoneController::class);
Route::get('providers', [ProviderController::class, 'index']);
Route::get('generate', [HandphoneController::class, 'generate']);
