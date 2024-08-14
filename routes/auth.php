<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('creer-un-compte', 'pages.auth.register')
        ->name('register');

    Volt::route('connexion', 'pages.auth.login')
        ->name('login');

    Volt::route('mot-de-pass-oublie', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('renitialiser-le-mot-de-passe/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verifier-votre-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
