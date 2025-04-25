<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\NewsletterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Főoldal
Route::get('/', [SiteController::class, 'home'])->name('home');

// Funkciók oldal
Route::get('/funkciok', [SiteController::class, 'features'])->name('features');

// Árak oldal
Route::get('/arak', [SiteController::class, 'pricing'])->name('pricing');

// Vélemények oldal
Route::get('/velemenyek', [SiteController::class, 'testimonials'])->name('testimonials');

// Kapcsolat oldal
Route::get('/kapcsolat', [SiteController::class, 'contact'])->name('contact');
Route::post('/kapcsolat', [SiteController::class, 'processContact'])->name('contact.process');

// Demó oldal
Route::get('/demo', [SiteController::class, 'demo'])->name('demo');
Route::post('/demo', [SiteController::class, 'processDemo'])->name('demo.process');

// Hírlevél feliratkozás
Route::post('/hirlevel-feliratkozas', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Jogi oldalak
Route::get('/felhasznalasi-feltetelek', [SiteController::class, 'terms'])->name('terms');
Route::get('/adatvedelmi-iranyelvek', [SiteController::class, 'privacy'])->name('privacy');



// Admin felület - bejelentkezés után elérhető
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Kapcsolat üzenetek kezelése
    Route::get('/contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contacts.show');
    Route::put('/contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');

    // Feladatok kezelése
    Route::get('/tasks', [App\Http\Controllers\Admin\TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [App\Http\Controllers\Admin\TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{task}', [App\Http\Controllers\Admin\TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [App\Http\Controllers\Admin\TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::post('/tasks/{task}/complete', [App\Http\Controllers\Admin\TaskController::class, 'complete'])->name('tasks.complete');
});

// Bejelentkezés és autentikáció
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
