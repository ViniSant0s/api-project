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

//Route::post('/empresa', [app\Http\Controllers\ApiController::class, 'createEmpresa']);
//Route::get('/empresa/{id}', [app\Http\Controllers\ApiController::class, 'getEmpresa']);
//Route::get('/empresa/all', [App\Http\Controllers\ApiController::class, 'getAllEmpresas']);

Route::get('/empresa/all', 'app\Http\Controllers\ApiController@getAllEmpresas');