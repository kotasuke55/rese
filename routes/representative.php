<?php

use App\Http\Controllers\Representative\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Representative\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Representative\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Representative\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Representative\Auth\NewPasswordController;
use App\Http\Controllers\Representative\Auth\PasswordResetLinkController;
use App\Http\Controllers\Representative\Auth\RegisteredUserController;
use App\Http\Controllers\Representative\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepresentativeController;

Route::middleware('guest:representative')->group(function () {


    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth:representative')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::get('management',[RepresentativeController::class,'index']);

    Route::post('create',[RepresentativeController::class,'create']);

    Route::get('select',[RepresentativeController::class,'find']);
                
    Route::post('update',[RepresentativeController::class,'update']);

    Route::post('reserve',[RepresentativeController::class,'reserve']);
    
    Route::post('representative/delete',[RepresentativeController::class,'remove']);

});
