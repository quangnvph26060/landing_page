<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\Config\ConfigController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.layouts.master');
});


route::prefix('admin')->name('admin.')->group(function () {
    route::middleware(['auth'])->group(function () {

        route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // start Configuration
        route::prefix('configuration')->name('configuration.')->group(function () {
            route::get('/', [ConfigController::class, 'index'])->name('index');
            route::post('/', [ConfigController::class, 'store'])->name('store');
        });
    });

    route::middleware('guest')->group(function () {
        route::get('/login', [AuthController::class, 'login'])->name('login');
        route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    });
});
