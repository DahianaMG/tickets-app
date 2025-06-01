<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\TicketController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Provincia
Route::get('get-provincias', [ProvinciaController::class, 'index']);
Route::get('get-provincia-tickets/{id}', [ProvinciaController::class, 'getProvinciaTickets']);

// Tiket
Route::get('get-tickets', [TicketController::class, 'index']);
Route::get('get-ticket/{id}', [TicketController::class, 'show']);
Route::post('set-ticket', [TicketController::class, 'store']);
Route::put('update-ticket/{id}', [TicketController::class, 'update']);
Route::delete('delete-ticket/{id}', [TicketController::class, 'destroy']);
