<?php

use App\Http\Controllers\EleveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| Routes API SGVPS
|--------------------------------------------------------------------------
*/

Route::apiResource('eleves', EleveController::class)
    ->parameters(['eleves' => 'eleve']);
