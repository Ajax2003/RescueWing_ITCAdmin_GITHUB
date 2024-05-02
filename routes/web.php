<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminArchiveController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\MapController;
use App\Events\Alerts;


Route::get('/login', function () {
    return view('auth.login');
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
Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin']);

//REDIRECT TO ADMINISTRATION 
Route::get('/admin', [AdminUserController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.useradmin');
//REDIRECT TO ARCHIVE
Route::get('admin/archive', [AdminArchiveController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('/restore/{id}', [AdminArchiveController::class, 'restore'])->name('user.restore');
Route::post('/restore-all', [AdminArchiveController::class, 'restore'])->name('user.restoreAll');


//ADD-UPDATED-DELETE OF ADMIN USERS
Route::group(['prefix' => 'admin/user', 'middleware' => ['auth', 'admin', 'status']], function () {
    Route::get('/create', [AdminUserController::class, 'create'])->name('user.create'); // Create user form
    Route::post('/add', [AdminUserController::class, 'store'])->name('user.store'); // Store new user
    Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit'); // Edit user form
    Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('user.update'); // Update user
    Route::get('/softDelete/{id}', [AdminUserController::class, 'softDelete'])->name('user.softdelete');
    Route::delete('/delete/{id}', [AdminUserController::class, 'destroy'])->name('user.delete');
    Route::post('admin/user/user/{id}', [StatusController::class, 'update'])->name('user.status');
});

//REDIRECTS TO FACILITY DASHBOARD
Route::get('facility/dashboard', [FacilityController::class, 'index']);

//REDIRECTS TO BARANGAY DASHBOARD
Route::get('barangay/dashboard', [BarangayController::class, 'index']);

Route::get('/adminprofile', function () {
    return view('admin.adminprofile');
});


//FACILITIES
Route::get('/emergency', [PortalController::class, 'emergency']);
Route::post('/emergency-clicked', [PortalController::class, 'eclicked'])->name('e-clicked');
Route::post('/security-clicked', [PortalController::class, 'sclicked'])->name('s-clicked');
Route::post('/medical-clicked', [PortalController::class, 'mclicked'])->name('m-clicked');

Route::get('/dashReports', [PortalController::class, 'dashReports']);

Route::get('/security', [PortalController::class, 'security']);

Route::get('/medical', [PortalController::class, 'medical']);

Route::get('/gps', [MapController::class, 'index']);

