<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Management\User\UserIndex;

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

require __DIR__.'/settings.php';
