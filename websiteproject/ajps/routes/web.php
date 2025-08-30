<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;

// ==================== ROOT DEFAULT ROUTE ====================
Route::get('/', function () {
    return view('homme'); // Vue SPA mount point
});

// ==================== AUTH ROUTES ====================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================== DASHBOARD ROUTE ====================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ==================== SHORTCUT REDIRECT ROUTES ====================
Route::get('/reservation', fn() => redirect()->route('dashboard', ['page' => 'reservation']))->name('reservation');
Route::get('/booking', fn() => redirect()->route('dashboard', ['page' => 'booking']))->name('booking');
Route::get('/artist', fn() => redirect()->route('dashboard', ['page' => 'artist']))->name('artist');

// ==================== RESERVATION CRUD ROUTES ====================
Route::resource('reservations', ReservationController::class)->except(['edit', 'show']);
Route::get('/reservations/{id}/edit-show', [ReservationController::class, 'showEditModal'])->name('reservations.edit.show');
Route::get('/reservations/clear-edit', [ReservationController::class, 'clearEdit'])->name('reservations.edit.clear');

// ==================== Contact Form ====================
Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');

Route::get('/contact', function () {
    return view('contact'); // Vue SPA mount point
});

// ==================== SPA Catch-All Route ====================
Route::get('/{homme}', function () {
    return view('homme'); // i-serve ang Vue SPA
})->where('any', '.*');
