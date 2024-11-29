<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColetaController;
use App\Http\Controllers\TransportadoraRatingController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/transportadoras', [UserController::class, 'listTransportadoras'])->name('transportadoras.list');

Route::get('/coletas/create', [ColetaController::class, 'create'])->name('coletas.create');
Route::post('/coletas/store', [ColetaController::class, 'store'])->name('coletas.store');
Route::get('/coletas', [ColetaController::class, 'index'])->name('coletas.index');

Route::get('/ratings/{transportadora_id}/create', [TransportadoraRatingController::class, 'create'])
    ->middleware('auth')->name('ratings.create');
Route::post('/ratings', [TransportadoraRatingController::class, 'store'])
    ->name('ratings.store');
Route::get('/ratings/{transportadora_id}', [TransportadoraRatingController::class, 'show'])
    ->middleware('auth')->name('ratings.show');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard', ['user' => Auth::user()]);
})->middleware('auth')->name('dashboard');

Route::get('/notificar-problema', [IssueController::class, 'showNotificationForm'])
->middleware('auth')->name('issues.form');
Route::post('/notificar-problema', [IssueController::class, 'submitNotification'])
->middleware('auth')->name('issues.submit');
