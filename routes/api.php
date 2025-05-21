<?php

use App\Http\Controllers\Api\AbogadoController;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ExpedienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('abogados', AbogadoController::class);
Route::apiResource('abogados.agendas', AgendaController::class)->scoped();
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('expedientes', ExpedienteController::class);