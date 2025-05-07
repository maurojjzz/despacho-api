<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\AbogadoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('abogados', AbogadoController::class);
Route::apiResource('abogados.agendas', AgendaController::class)->scoped();
