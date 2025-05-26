<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePageController;
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
