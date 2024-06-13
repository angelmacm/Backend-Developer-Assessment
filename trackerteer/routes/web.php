<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('register', [RegistrationController::class, 'showForm'])->name('register.form');
Route::post('register', [RegistrationController::class, 'register'])->name('register');
Route::get('congratulations', function () {
    return view('congratulations');
})->name('congratulations');
