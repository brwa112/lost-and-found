<?php

use App\Http\Controllers\Admin\CategoryContrller;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');


Route::middleware('auth')->group(function () {

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(IsAdmin::class)->group(function(){
    Route::get('/AdminDashboard', function(){
        return Inertia::render('Admin/AdminDashboard');
    })->name('admindashboard');


    Route::resource('/category',CategoryContrller::class)->names('category');

});

require __DIR__.'/auth.php';
