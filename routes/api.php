<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\API\AuthController;

//Provincia
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('get-provincias', [ProvinciaController::class, 'index']);
});
Route::get('get-provincia-tickets/{id}', [ProvinciaController::class, 'getProvinciaTickets']);

// Tiket
Route::get('get-tickets', [TicketController::class, 'index']);
Route::get('get-ticket/{id}', [TicketController::class, 'show']);
Route::post('set-ticket', [TicketController::class, 'store']);
Route::put('update-ticket/{id}', [TicketController::class, 'update']);
Route::delete('delete-ticket/{id}', [TicketController::class, 'destroy']);
