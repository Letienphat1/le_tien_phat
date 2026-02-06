<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Management\User\UserIndex;
use App\Livewire\Back\Management\Project\ProjectIndex;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::prefix('management')->name('management.')->group(function () {
        Route::livewire('users', UserIndex::class)->name('users');
    });
});

Route::prefix('back')->middleware('auth')->name('back.')->group(function () {
    Route::prefix('management')->name('management.')->group(function () {
        Route::livewire('projects', ProjectIndex::class)->name('projects');
    });
});

require __DIR__ . '/settings.php';
