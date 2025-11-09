<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/health/appointments', [HealthController::class, 'getAppointments']);
    Route::post('/health/book-appointment', [HealthController::class, 'bookAppointment']);
    Route::post('/health/emergency-report', [HealthController::class, 'reportEmergency']);
});
