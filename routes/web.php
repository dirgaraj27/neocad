<?php

use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('auth/login');
});

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// user table route
Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
Route::put('admin/users/{user}/status', [UserController::class, 'updateStatus'])->name('admin.users.updateStatus');
// user table route



// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // Service Type Routes
    Route::get('/service_types', [ServiceTypeController::class, 'index'])->name('service_types.index');
    Route::get('/admin/service_types/create', function () {
        return view('admin.service_types.create');
    });
    Route::post('/admin/service_types', [ServiceTypeController::class, 'store'])->name('service_types.store');
    Route::get('/admin/service_types/{serviceType}/edit', [ServiceTypeController::class, 'edit'])->name('service_types.edit');
    Route::put('/admin/service_types/{serviceType}', [ServiceTypeController::class, 'update'])->name('service_types.update');
    Route::delete('/admin/service_types/{serviceType}', [ServiceTypeController::class, 'destroy'])->name('service_types.destroy');

    // User Routes
    Route::resource('/admin/users', UserController::class)->except(['show']);
    Route::put('/admin/users/{user}/status', [UserController::class, 'updateStatus'])->name('admin.users.updateStatus');



    // Dashboard Route
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Dental Office Routes
Route::middleware(['auth', 'verified', 'dentaloffice'])->group(function () {
    Route::get('/dentaloffice/dashboard', function () {
        return view('dentaloffice.dashboard');
    })->name('dentaloffice.dashboard');
});

// Lab Partner Routes
Route::middleware(['auth', 'verified', 'partnerlab'])->group(function () {
    Route::get('/partnerlab/dashboard', function () {
        return view('partnerlab.dashboard');
    })->name('partnerlab.dashboard');
});

// Auth Routes (Login, Register, etc.)
require __DIR__.'/auth.php';
