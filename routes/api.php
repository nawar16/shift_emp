<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\API\ShiftController;
use App\Http\Controllers\API\WorkerController;
use App\Http\Controllers\API\Auth\AuthController;
=======
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\WorkerController;
use App\Http\Controllers\API\ShiftController;
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'auth'], function () {
    Route::post('/register', [AuthController::class, 'createUser']);
    Route::post('/login', [AuthController::class, 'loginUser']);
});

<<<<<<< HEAD
Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::post('/shifts/{id}', [ShiftController::class, 'assignShifts'])->name('shifts.assign');
=======

Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::post('/shifts/{id}', [ShiftController::class, 'assignShifts']);
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
    Route::resource('/shifts', ShiftController::class);

    Route::resource('/workers', WorkerController::class);

});


