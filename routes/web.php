<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Permission
Route::resource('permissions',PermissionController::class);
Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

// Role
Route::resource('roles',RoleController::class);
Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);

