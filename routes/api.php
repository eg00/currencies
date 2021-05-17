<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('currencies', [CurrencyController::class, 'index']);
    Route::get('currency/{currency}', [CurrencyController::class, 'show']);
});
