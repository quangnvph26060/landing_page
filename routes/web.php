<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Config\ConfigController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


route::prefix('admin')->name('admin.')->group(function () {
    route::middleware(['auth'])->group(function () {

        route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // start Configuration

        route::prefix('configuration')->name('configuration.')->controller(ConfigController::class)->group(function () {

            route::get('/', 'index')->name('index');
            route::post('/', 'store')->name('store');


            route::get("session/{value}", 'configHome')->name("session");

            route::post("session/{value}", 'postSession')->name("postSession");

            route::post('session/{id}/update', 'update')->name('update');
            route::delete('session/{id}', 'destroy')->name('destroy');

            route::delete('session/{id}/image', 'deleteImage')->name('image.destroy');

         
        });
    });

    route::middleware('guest')->group(function () {
        route::get('/login', [AuthController::class, 'login'])->name('login');
        route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    });
});
