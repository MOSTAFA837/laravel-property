<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AmenitieController;
use App\Http\Controllers\Backend\PropertyController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

// User Frontend Routes
Route::get('/', [UserController::class, 'Index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');
});

require __DIR__ . '/auth.php';

// Admin Routes
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])
    ->name('admin.login')
    ->middleware(RedirectIfAuthenticated::class);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // Property Types
    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('/all/type', 'view')->name('all.type');
        Route::get('/add/type', 'add')->name('add.type');
        Route::post('/store/type', 'store')->name('store.type');
        Route::get('/edit/type/{id}', 'edit')->name('edit.type');
        Route::post('/update/type/{id}', 'update')->name('update.type');
        Route::get('/delete/type/{id}', 'delete')->name('delete.type');
    });

    // Amenitie
    Route::controller(AmenitieController::class)->group(function () {
        Route::get('/all/amenitie', 'view')->name('all.amenitie');
        Route::get('/add/amenitie', 'add')->name('add.amenitie');
        Route::post('/store/amenitie', 'store')->name('store.amenitie');
        Route::get('/edit/amenitie/{id}', 'edit')->name('edit.amenitie');
        Route::post('/update/amenitie/{id}', 'update')->name('update.amenitie');
        Route::get('/delete/amenitie/{id}', 'delete')->name('delete.amenitie');
    });

    // Property
    Route::controller(PropertyController::class)->group(function () {
        Route::get('/all/property', 'view')->name('all.property');
        Route::get('/add/property', 'add')->name('add.property');
        Route::post('/store/property', 'store')->name('store.property');
        Route::get('/edit/property/{id}', 'edit')->name('edit.property');
        Route::post('/update/property/{id}', 'update')->name('update.property');
        Route::get('/delete/property/{id}', 'delete')->name('delete.property');

        Route::post('/update/property/thambnail/{id}', 'updateThambnail')->name('update.property.thambnail');
        Route::post('/update/multiimage', 'updateMultiImage')->name('update.property.multiimage');
        Route::get('/delete/property/multiimage/{id}', 'deleteMultiImage')->name('delete.property.multiimage');
        Route::post('/store/new/multiimage', 'storeMultiImage')->name('store.property.multiimage');
    });
});

// Agent Routes
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});
