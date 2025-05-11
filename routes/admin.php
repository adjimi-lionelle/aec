<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/admin', function () {
//     return view('view_admin/layouts/index');
// });

// Route::middleware(['middleware' => 'user'])->prefix('roles')->name('roles.')->group(function () {
    Route::get('roles', [RolePermissionController::class, 'index'])->name('roles.index');
    Route::get('roles.add', [RolePermissionController::class, 'create'])->name('roles.create');
    Route::post('roles.add', [RolePermissionController::class, 'store'])->name('roles.store');
    Route::get('roles/edit/{role}', [RolePermissionController::class, 'edit'])->name('roles.edit');
    Route::put('roles/update/{role}', [RolePermissionController::class, 'update'])->name('roles.update');
    Route::delete('roles/delete/{role}', [RolePermissionController::class, 'delete'])->name('roles.delete');
// });

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('view_admin/layouts/dashboard');  

Route::group(['middleware' => 'user'], function () {
});


Route::get('/login', [AuthController::class, 'connecter'])->name('view_site/layouts/connecter');
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/logout', [AuthController::class, 'deconnecter'])->name('view_site/layouts/connecter');
// Route::post('/logout', [AuthController::class, 'logout']);
