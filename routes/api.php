<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/schedules', [ScheduleController::class, 'schedules']);
    Route::post('/schedules', [ScheduleController::class, 'store']);
});
