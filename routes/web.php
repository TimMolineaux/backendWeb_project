<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

require __DIR__.'/auth.php';

//profielpagina
Route::get('/mijn-profiel', [ProfilePageController::class, 'myProfile'])
    ->middleware('auth')
    ->name('profile.myProfile');

//profiel aanpassen
Route::get('/mijn-profiel/bewerken', [ProfilePageController::class, 'edit'])
    ->middleware('auth')
    ->name('profile.edit');

Route::patch('/mijn-profiel/bewerken', [ProfilePageController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');


//gebuikersbeheer
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin.userIndex');
});

//rol aanpassen
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin.userIndex');
    Route::patch('/admin/{user}/role', [UserController::class, 'updateRole'])->name('admin.updateRole');
});

//gebruiker aanmaken
Route::post('/admin', [UserController::class, 'store'])->name('admin.store');