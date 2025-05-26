<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'showNews'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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

//nieuwsitems
//voor standaard gebruikers
Route::get('/nieuws', [NewsController::class, 'index'])->name('news.index');
Route::get('/nieuws/{news}', [NewsController::class, 'show'])->name('news.show');

//voor admins
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/nieuws', [NewsController::class, 'newsIndex'])->name('news.newsIndex');
    Route::get('/admin/nieuws/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/admin/nieuws', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/nieuws/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/admin/nieuws/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/nieuws/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});