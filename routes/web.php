<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciaController;

// Ruta para crear una provincia
Route::post('/provincias', [ProvinciaController::class, 'create']);
