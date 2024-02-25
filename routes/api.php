<?php

use App\Config\PermissionConstants;
use App\Http\Controllers\Api\ClinicController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | API Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register API routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | is assigned the "api" middleware group. Enjoy building your API!
 * |
 */

Route::middleware('auth:api')->group(function () {
    // Roles
    Route::get('roles', [RoleController::class, 'index'])->middleware('permission:' . PermissionConstants::VIEW_ROLES);
    Route::post('create-role', [RoleController::class, 'store'])->middleware('permission:' . PermissionConstants::CREATE_ROLE);

    // Clinic
    Route::get('clinics', [ClinicController::class, 'index']);
    Route::post('create-clinic', [ClinicController::class, 'store']);

    // Users
    Route::get('users', [UserController::class, 'index'])->middleware('permission:' . PermissionConstants::VIEW_USERS);;
    Route::post('create-user', [UserController::class, 'store']);
    Route::put('update-user/{id}', [UserController::class, 'update']);
});

require __DIR__ . '/auth.php';
