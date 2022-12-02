<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| API Routes
|-----------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// public routes
Route::get('me', [AuthController::class, 'me']);
Route::get('/shoes', [ShoeController::class, 'index']);
Route::get('/shoes/{id}', [ShoeController::class, 'show']);
Route::post('register', [AuthController::class, 'register']);
Route::get('/pembayarans', [PembayaranController::class, 'index']);
Route::get('/pembayarans/{id}', [PembayaranController::class, 'show']);

// Route::post('/pembayarans', [PembayaranController::class, 'store']);
// Route::post('/shoes', [ShoeController::class, 'store']);
// Route::put('/shoes/{id}', [ShoeController::class, 'update']);
// Route::delete('/shoes/{id}', [ShoeController::class, 'destroy']);
// Route::delete('/pembayarans/{id}', [PembayaranController::class, 'destroy']);
// Route::put('/pembayarans/{id}', [PembayaranController::class, 'update']);

Route::post('/login', [AuthController::class, 'login']);
// protected routes
Route::middleware('auth:sanctum')->group(function (){
    Route::resource('shoes', ShoeController::class)->except(['create', 'edit', 'index', 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('pembayarans', PembayaranController::class)->except('create', 'edit', 'show', 'index');
});