<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SuratController;
use App\Models\About;
use Illuminate\Http\Request;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('category',[CategoryController::class,'index']);
    Route::post('simpan/category',[CategoryController::class,'store']);
    Route::get('about',[AboutController::class,'index']);
    Route::post('update/about',[AboutController::class,'update']);
    Route::get('surat',[SuratController::class,'index']);
    Route::post('simpan/surat',[SuratController::class,'store']);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
