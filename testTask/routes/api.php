<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
// GET /services/{service_id}/tarifs
// PUT /users/{user_id}/services/{service_id}/tarif
Route::get('/services/{service_id}/tarifs', [ApiController::class, "GetServicesTarifs"]);
Route::put('/users/{user_id}/services/{service_id}/tarif', [ApiController::class, "PutServicesTarif"]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
