<?php

use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CalendarController;
use Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', function () {
    return view('auth/login');
});


// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // Service Type Routes
    Route::get('/service_types', [ServiceTypeController::class, 'index'])->name('service_types.index');
    Route::get('/service_types/create', function () {
        return view('admin.service_types.create');
    });
    Route::post('/service_types', [ServiceTypeController::class, 'store'])->name('service_types.store');
    Route::get('/admin/service_types/{serviceType}/edit', [ServiceTypeController::class, 'edit'])->name('service_types.edit');
    Route::put('/admin/service_types/{serviceType}', [ServiceTypeController::class, 'update'])->name('service_types.update');
    Route::delete('/admin/service_types/{serviceType}', [ServiceTypeController::class, 'destroy'])->name('service_types.destroy');

   // Services Routes
   Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
   Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
   Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
   Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
   Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
   Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    //calendar routs
    Route::get('/calendar', [CalendarController::class, 'index'])->name('admin.calendar.index');

     // Cases Routes
     Route::get('/cases', [CaseController::class, 'index'])->name('admin.cases.index');
     Route::get('/cases/create', [CaseController::class, 'create'])->name('admin.cases.create');
     Route::post('/cases', [CaseController::class, 'store'])->name('cases.store');
     Route::get('/cases/{cases}/edit', [CaseController::class, 'edit'])->name('admin.cases.edit');
     Route::put('/cases/{case}', [CaseController::class, 'update'])->name('cases.update');
     Route::delete('/cases/{case}', [CaseController::class, 'destroy'])->name('cases.destroy');
     Route::get('/get-services/{serviceType}', [CaseController::class, 'getServices']);
     Route::get('/get-service-price/{serviceId}', [CaseController::class, 'getServicePrice']);
     Route::post('/cases/{case}/files', [CaseController::class, 'storeFiles']);
     Route::delete('/cases/files/{file}', [CaseController::class, 'deleteFile']);
     Route::get('/cases/{case}/files', [CaseController::class, 'getFiles']);


     // user table route
     Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
     Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
     Route::post('/users', [UserController::class, 'store'])->name('users.store');
     Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
     Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
     Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
     // user table route

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

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Auth Routes (Login, Register, etc.)
require __DIR__.'/auth.php';
