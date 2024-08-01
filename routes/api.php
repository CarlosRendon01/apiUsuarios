<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('carros', CarrosController::class);
