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

Route::post('/empresa', [ApiController::class, 'createEmpresa']);
Route::get('/empresa/all', [ApiController::class, 'getAllEmpresas']);
Route::get('/empresa/{id}', [ApiController::class, 'getEmpresa']);
Route::put('/empresa/edit/{id}', [ApiController::class, 'updateEmpresa']);
Route::delete('/empresa/delete/{id}', [ApiController::class, 'deleteEmpresa']);

Route::post('/admin', [ApiController::class, 'createAdmin']);
Route::get('/admin/all', [ApiController::class, 'getAllAdmins']);
Route::get('/admin/{id}', [ApiController::class, 'getAdmin']);
Route::put('/admin/edit/{id}', [ApiController::class, 'updateAdmin']);
Route::delete('/admin/delete/{id}', [ApiController::class, 'deleteAdmin']);

Route::post('/admin/saque/{id}', [ApiController::class, 'solicitarSaque']);