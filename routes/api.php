<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\VehicalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function () {  
    Route::put('update-profile/{id}', [AuthController::class, 'updateProfile']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('vehicals', [VehicalController::class, 'index']); // Get all vehicles
    Route::get('vehicals/{id}', [VehicalController::class, 'show']); // Get vehicle by ID
    Route::post('logout', [AuthController::class, 'logout']);
});
