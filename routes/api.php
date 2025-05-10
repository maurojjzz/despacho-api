<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\AbogadoController;

Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('abogados', AbogadoController::class);
Route::apiResource('abogados.agendas', AgendaController::class)->scoped();
