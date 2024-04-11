
<?php

use App\Http\Controllers\DuftnotenController;
use App\Http\Controllers\KaufortController;
use App\Http\Controllers\parfumController;
use App\Http\Controllers\ParfumherkunftController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('duftnoten', [DuftnotenController::class, 'index']);
Route::delete('duftnoten/{id}', [DuftnotenController::class, 'destroy']);
Route::put('duftnoten/{id}', [DuftnotenController::class, 'update']);
Route::post('duftnoten', [DuftnotenController::class, 'store']);

Route::get('kaufort', [KaufortController::class, 'index']);
Route::delete('kaufort/{id}', [KaufortController::class, 'destroy']);
Route::put('kaufort/{id}', [KaufortController::class, 'update']);
Route::post('kaufort', [KaufortController::class, 'store']);

Route::get('parfumherkunft', [parfumherkunftController::class, 'index']);
Route::delete('parfumherkunft/{id}', [parfumherkunftController::class, 'destroy']);
Route::put('parfumherkunft/{id}', [parfumherkunftController::class, 'update']);
Route::post('parfumherkunft', [parfumherkunftController::class, 'store']);

Route::get('/parfum', [parfumController::class, 'index']);
Route::delete('/parfum/{id}', [parfumController::class, 'destroy']);
Route::put('/parfum/{id}', [parfumController::class, 'update']);
Route::post('/parfum', [parfumController::class, 'store']);
