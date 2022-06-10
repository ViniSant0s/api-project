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
    Route::post('/', [ApiController::class, 'createEmpresa']); //cria nova empresa
    Route::get('/all', [ApiController::class, 'getAllEmpresas']); // retorna todas as empresas
    Route::get('/{id}', [ApiController::class, 'getEmpresa']); // retorna empresa especifica pelo id
    Route::put('/edit/{id}', [ApiController::class, 'updateEmpresa']); // edita uma empresa
    Route::delete('/delete/{id}', [ApiController::class, 'deleteEmpresa']); // deleta uma empresa
    Route::put('/validar/{id}', [ApiController::class, 'validarEmail']); // valida o email da empresa
});

Route::prefix('/admin')->group(function () {
    Route::post('/', [ApiController::class, 'createAdmin']); // cria um admin
    Route::get('/all', [ApiController::class, 'getAllAdmins']); // retorna todos os admins
    Route::get('/{id}', [ApiController::class, 'getAdmin']); // retorna um admin
    Route::put('/edit/{id}', [ApiController::class, 'updateAdmin']); // edita um admin
    Route::delete('/delete/{id}', [ApiController::class, 'deleteAdmin']); // deleta um admin
    Route::put('/alterar_saldo/{id}', [ApiController::class, 'alterarSaldo']); // altera saldo de uma empresa
    Route::post('/saque/{id}', [ApiController::class, 'solicitarSaque']); // realiza o saque para uma empresa
});