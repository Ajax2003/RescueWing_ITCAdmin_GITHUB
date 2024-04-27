<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BarangayController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminpanel', function () {
    return view('admin.admin_panel');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//REDIRECTS TO ADMIN DASHBOARD
Route::get('/adminpanel', [AdminController::class, 'index'])->middleware(['auth', 'admin']);

//DASHBOARD ADMIN TO ADMINISTRATION 
Route::get('/admin', [AdminUserController::class, 'index'])->name('admin.useradmin');
//ADD-UPDATED-DELETE OF ADMIN USERS
Route::group(['prefix' => 'admin/user', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/create', [AdminUserController::class, 'create'])->name('user.create'); // Create user form
    Route::post('/add', [AdminUserController::class, 'store'])->name('user.store'); // Store new user
    Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit'); // Edit user form
    Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('user.update'); // Update user
    Route::delete('/delete/{id}', [AdminUserController::class, 'destroy'])->name('user.delete'); // Delete user
});

//REDIRECTS TO FACILITY DASHBOARD
Route::get('facility/dashboard', [FacilityController::class, 'index']);

//REDIRECTS TO BARANGAY DASHBOARD
Route::get('barangay/dashboard', [BarangayController::class, 'index']);