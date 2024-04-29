<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaseController;

Route::get('/', function () {
    return view('auth/login');
});


// Route::get('dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Admin Dashboard
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');

// Dental Office Dashboard
Route::get('dentaloffice/dashboard', function () {
    return view('dentaloffice.dashboard');
})->middleware(['auth', 'verified', 'dentaloffice'])->name('dentaloffice.dashboard');

// Labpartner Dashboard
Route::get('partnerlab/dashboard', function () {
    return view('partnerlab.dashboard');
})->middleware(['auth', 'verified', 'partnerlab'])->name('partnerlab.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
