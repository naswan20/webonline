<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Teknisi\DashboardController as TeknisiDashboard;
use App\Http\Controllers\Teknisi\OrderController as TeknisiOrderController;
use App\Http\Controllers\Pelanggan\DashboardController as PelangganDashboard;
use App\Http\Controllers\Pelanggan\OrderController as PelangganOrderController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('orders', AdminOrderController::class);
});

// Teknisi Routes
Route::middleware(['auth', 'role:teknisi'])->prefix('teknisi')->name('teknisi.')->group(function () {
    Route::get('/dashboard', [TeknisiDashboard::class, 'index'])->name('dashboard');
    Route::resource('orders', TeknisiOrderController::class)->only(['index', 'show', 'update']);
});

// Pelanggan Routes
Route::middleware(['auth', 'role:pelanggan'])->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/dashboard', [PelangganDashboard::class, 'index'])->name('dashboard');
    Route::resource('orders', PelangganOrderController::class);
});

Route::group(['middleware' => ['auth', 'checkrole:pelanggan'], 'prefix' => 'pelanggan'], function () {
    Route::get('/dashboard', [App\Http\Controllers\Pelanggan\DashboardController::class, 'index'])->name('pelanggan.dashboard');
});