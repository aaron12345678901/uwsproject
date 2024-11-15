<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Group of routes for guest (unauthenticated) users
Route::middleware('guest')->group(function () {
    // Route to the registration form, handled by RegisteredUserController's 'create' method
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    
    // Route to process user registration, handled by RegisteredUserController's 'store' method
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Route to the login form, handled by AuthenticatedSessionController's 'create' method
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    // Route to process login, handled by AuthenticatedSessionController's 'store' method
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route to request a password reset link, handled by PasswordResetLinkController's 'create' method
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    // Route to send the password reset link, handled by PasswordResetLinkController's 'store' method
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    // Route to the password reset form, accessed via a token, handled by NewPasswordController's 'create' method
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    // Route to save the new password, handled by NewPasswordController's 'store' method
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// Group of routes for authenticated users
Route::middleware('auth')->group(function () {
    // Route prompting users to verify their email, handled by EmailVerificationPromptController
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    // Route to verify email using a unique ID and hash, with signed and throttled middleware
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Route to resend email verification notification, with a throttling limit of 6 requests per minute
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Route to confirm password before performing sensitive actions, handled by ConfirmablePasswordController's 'show' method
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    // Route to validate the confirmed password, handled by ConfirmablePasswordController's 'store' method
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route to update the user's password, handled by PasswordController's 'update' method
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Route to log out the user, handled by AuthenticatedSessionController's 'destroy' method
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});