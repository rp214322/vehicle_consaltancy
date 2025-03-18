<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\UsersController;
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

Route::get('vehicals', [UsersController::class, 'vehicleDetails']); // Get all vehicles
Route::get('vehicals/{identifier}', [UsersController::class, 'showVehicle']); // Get vehicle by ID
Route::post('/inquiries', [UsersController::class, 'storeInquiry']);

Route::middleware('auth:sanctum')->group(function () {
    Route::put('update-profile/{id}', [AuthController::class, 'updateProfile']);
    Route::post('logout', [AuthController::class, 'logout']);
});
