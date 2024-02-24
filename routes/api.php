<?php

use App\Http\Controllers\Api\ClinicController;
use App\Http\Controllers\Api\RoleController;
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

// Roles
Route::get('roles', [RoleController::class, 'index']);
Route::post('create-role', [RoleController::class, 'store']);

// Clinic
Route::get('clinics', [ClinicController::class, 'index']);
Route::post('create-clinic', [ClinicController::class, 'store']);
