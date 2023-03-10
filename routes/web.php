<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InoviceController;
use App\Http\Controllers\PaymintController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\Sub_packagesController;
use App\Http\Controllers\Sub_ServicesController;
use App\Http\Controllers\Purchase_serviceController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionsController::class);
Route::resource('services', ServicesController::class);
Route::resource('sub-services', Sub_ServicesController::class);
Route::resource('sub_packages', Sub_packagesController::class);
Route::resource('packages', PackagesController::class);
Route::resource('clients', ClientController::class);
Route::resource('purchases', Purchase_serviceController::class);
Route::resource('invoices', InoviceController::class);
Route::resource('paymint', PaymintController::class);
