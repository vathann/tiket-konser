<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Transaction;

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
    return view('welcome');
})->name('home');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/edit-tiket', function () {
    return view('edit-tiket');
})->name('signup');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/beli', [Controller::class, 'form_beli'])->name('beli');
Route::post('/beli', [TransactionController::class, 'create'])->name('transactions.create');

Route::get('/myticket', [TransactionController::class, 'myticket'])->name('myticket')->middleware('auth');
Route::get('/myticket/{id}', [TransactionController::class, 'destroy'])->name('myticket.destroy');
Route::get('/dashboard-admin', [Controller::class, 'index'])->name('dashboard-admin');


Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit_admin'])->name('transactions.edit');
Route::post('/transactions/{id}', [TransactionController::class, 'update_admin'])->name('transactions.update');
Route::post('/transactions/{id}/mark-paid', [TransactionController::class, 'markPaid'])->name('transactions.markPaid');
Route::post('/transaksi/{id}/lunasi', [TransactionController::class, 'lunasi'])->name('transaksi.lunasi');
Route::post('/print-tiket/{id}', [TransactionController::class, 'printTiket'])->name('print.tiket');

Route::get('/tickets-stok', [TicketsController::class, 'index'])->name('tickets.index');
Route::delete('/tickets-stok/{id}', [TicketsController::class, 'destroy'])->name('tickets.destroy');
Route::get('/tickets-stok/{id}/edit', [TicketsController::class, 'edit'])->name('tickets.edit');
Route::post('/tickets-stok/{id}', [TicketsController::class, 'update'])->name('tickets.update');
Route::get('/tickets-stok/create', [TicketsController::class, 'create'])->name('tickets.create');
Route::post('/tickets-stok', [TicketsController::class, 'store'])->name('tickets.store');

Route::post('/myticket/{id}', [TransactionController::class, 'update'])->name('myticket.update');
Route::get('/myticket/{id}/edit', [TransactionController::class, 'edit'])->name('myticket.edit');
