<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;

Route::get('/admin', function () {
    return view('view_admin/layouts/index');
});
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('view_admin/layouts/dashboard');

Route::get('/role', [RoleController::class, 'list']);
    Route::get('/role/add', [RoleController::class, 'add']);
    Route::post('/role/add', [RoleController::class, 'insert']);
    Route::get('/role/edit/{id}', [RoleController::class, 'edit']);
    Route::get('/role/edi/{id}', [RoleController::class, 'update']);
    Route::get('/role/delete/{id}', [RoleController::class, 'delete']);

Route::group(['middleware' => 'user'], function () {
    
});

Route::get('/login', [AuthController::class, 'connecter'])->name('view_site/layouts/connecter');
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/logout', [AuthController::class, 'deconnecter'])->name('view_site/layouts/connecter');
// Route::post('/logout', [AuthController::class, 'logout']);
