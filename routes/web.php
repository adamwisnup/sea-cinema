<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

Route::controller(MovieController::class)->group(function () {
    Route::get('/', 'index')->name('movies.index');
    Route::get('/movies/{id}', 'show')->name('movies.show');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::controller(BalanceController::class)->group(function () {
        Route::get('/balance/{user_id}', 'show')->name('balance.show');
        Route::post('/balance/deposit', 'deposit')->name('balance.deposit');
        Route::post('/balance/withdraw', 'withdraw')->name('balance.withdraw');
    });

    Route::get('/movies/{movieId}/book', [TicketController::class, 'showBookingForm'])->name('ticket.showBookingForm');
    Route::post('/movies/{movieId}/book', [TicketController::class, 'book'])->name('ticket.book');
    Route::post('/tickets/{ticketId}/cancel', [TicketController::class, 'cancel'])->name('ticket.cancel');
    Route::get('/tickets/history', [TicketController::class, 'history'])->name('ticket.history');


    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::get('/movies/{movieId}/book', [TicketController::class, 'showBookingForm'])->name('ticket.booking-form');
// Route::post('/movies/{movieId}/book', [TicketController::class, 'book'])->name('ticket.book');
// Route::get('/tickets/{ticketId}/cancel', [TicketController::class, 'showCancelForm'])->name('ticket.cancel-form');
// Route::post('/tickets/{ticketId}/cancel', [TicketController::class, 'cancel'])->name('ticket.cancel');
