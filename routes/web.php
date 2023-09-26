<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LottoController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/results', [HomeController::class, 'results'])->name('results');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::controller(LottoController::class)->group(function () {
    Route::get('/buy-ticket', 'buyTicket');
    Route::post('/buy-ticket', 'processPayment')->name('process-payment');
    Route::get('/buy-ticket-response', 'statusPayment')->name('status-payment');
});
Route::resource('tickets', TicketController::class)->only('index');
Route::controller(TransactionController::class)->group(function () {
    Route::get('/transactions', 'index')->name('transactions.index');
    Route::get('/withdrawal', 'create')->name('transactions.create');
    Route::post('/withdrawal', 'store')->name('transactions.store');
});
