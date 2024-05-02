<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::get('/hotels', [HotelController::class, 'index'])->name('admin.hotels');
        Route::get('/hotels/new', [HotelController::class, 'new'])->name('admin.hotels.new');
        Route::post('/hotels', [HotelController::class, 'store'])->name('admin.hotels.store');
        Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('admin.hotels.show');
        Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('admin.hotels.edit');
        Route::post('/hotels/{hotel}', [HotelController::class, 'update']);
        Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('admin.hotels.destroy');
        
        Route::get('/rooms', [RoomController::class, 'index'])->name('admin.rooms');
        Route::get('/rooms/new', [RoomController::class, 'new'])->name('admin.rooms.new');
        Route::get('/reservations', [ReservationController::class, 'index'])->name('admin.reservations');
        Route::get('/reservations/new', [ReservationController::class, 'new'])->name('admin.reservations.new');
        Route::get('/clients', [ClientController::class, 'index'])->name('admin.clients');
        Route::get('/clients/new', [ClientController::class, 'new'])->name('admin.clients.new');
    });
});
