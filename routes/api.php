<?php

use App\Http\Api\LoanApplication\LoanApplicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('/loan_applications', LoanApplicationController::class)
        ->only(['index', 'show', 'store', 'destroy']);
    Route::post('/loan_applications/{loan_application}/update', [LoanApplicationController::class, 'update']);
});

Route::prefix('/auth')->group(function () {
    Route::post('/login', [\App\Http\Api\User\Controllers\AuthController::class, 'login']);
});

