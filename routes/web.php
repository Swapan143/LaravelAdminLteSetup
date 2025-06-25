<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AuthController;

Route::get('/', function () {
    return redirect('login');
});

Route::get('login',[AuthController::class,'login']);
Route::post('login-verify',[AuthController::class,'loginVerify'])->name('login-verify');
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::get('/logout', [AuthController::class,'Logout']);
});