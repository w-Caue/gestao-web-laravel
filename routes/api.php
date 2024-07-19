<?php

use App\Http\Controllers\Api\v1\ContaController;
use App\Http\Controllers\Api\v1\PessoalController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::get('/pessoas', [PessoalController::class, 'index']);
    Route::get('/pessoas/{pessoa}', [PessoalController::class, 'show']);
    Route::get('/contas', [ContaController::class, 'index']);
    Route::get('/contas/{conta}', [ContaController::class, 'show']);
    Route::post('/contas', [ContaController::class, 'store']);
});
