<?php

use App\Http\Controllers\Api\AbogadoController;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\AsistenteController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ExpedienteController;
use App\Http\Controllers\Api\Valor_Historico_JusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('abogados', AbogadoController::class);
Route::apiResource('abogados.agendas', AgendaController::class)->scoped();
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('expedientes', ExpedienteController::class);
Route::apiResource('valor_historico_jus', Valor_Historico_JusController::class)
    ->parameters(['valor_historico_jus' => 'valor_historico_jus']);
Route::apiResource('asistentes', AsistenteController::class);