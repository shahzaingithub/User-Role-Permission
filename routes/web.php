<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => ['role:super admin|admin']], function () {
    
// Permission
Route::resource('permissions',PermissionController::class);
Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

// Role
Route::resource('roles',RoleController::class);
Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);

Route::get('roles/{roleId}/AddPermission', [RoleController::class, 'AddPermission']);

Route::put('roles/{roleId}/AddPermission', [RoleController::class, 'givepermissiontorole']);

// Users
Route::resource('users',UserController::class);
Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
