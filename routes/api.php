<?php 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route; 

/* 
|--------------------------------------------------------------------------
| API Routes 
|--------------------------------------------------------------------------
| 
| Here is where you can register API routes for your application. 
| These routes are loaded by the RouteServiceProvider within a group 
| which is assigned the "api" middleware group. Enjoy building your API! 
| 
*/

// Route untuk registrasi dan login
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']); 
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

// Route dengan middleware 'auth:sanctum' untuk mengamankan akses
Route::middleware('auth:sanctum')->group(function () { 
    Route::get('/user', function (Request $request) { 
        return $request->user(); 
    }); 

    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']); 
});
