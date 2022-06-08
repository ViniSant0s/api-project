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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/empresa')->group(function () {
    Route::post('/', [ApiController::class, 'createEmpresa']);
    Route::get('/all', [ApiController::class, 'getAllEmpresas']);
    Route::get('/{id}', [ApiController::class, 'getEmpresa']);
    Route::put('/edit/{id}', [ApiController::class, 'updateEmpresa']);
    Route::delete('/delete/{id}', [ApiController::class, 'deleteEmpresa']);
    Route::put('/validar/{id}', [ApiController::class, 'validarEmail']);
});

Route::prefix('/admin')->group(function () {
    Route::post('/', [ApiController::class, 'createAdmin']);
    Route::get('/all', [ApiController::class, 'getAllAdmins']);
    Route::get('/{id}', [ApiController::class, 'getAdmin']);
    Route::put('/edit/{id}', [ApiController::class, 'updateAdmin']);
    Route::delete('/delete/{id}', [ApiController::class, 'deleteAdmin']);
    Route::post('/saque/{id}', [ApiController::class, 'solicitarSaque']);
});