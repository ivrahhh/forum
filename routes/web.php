<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResendEmailVerificationLinkController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\UserAuthenticationController;
use App\Http\Controllers\Auth\UserRegistrationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth','verified'])->group(function() {
    Route::get('/', [HomeController::class,'index'])->name('home');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Authentication Routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('guest')->group(function() {
    Route::get('login', [UserAuthenticationController::class,'create'])->name('login');
    Route::post('login', [UserAuthenticationController::class,'store'])->name('login.auth');

    Route::get('register', [UserRegistrationController::class,'create'])->name('register');
    Route::post('register', [UserRegistrationController::class,'store'])->name('register.store');

    Route::get('password/forgot', [ForgotPasswordController::class,'create'])->name('password.request');
    Route::post('password/forgot', [ForgotPasswordController::class,'store'])->name('password.email');

    Route::get('password/reset/{token}', [ResetPasswordController::class,'edit'])->name('password.reset');
    Route::put('password/reset', [ResetPasswordController::class,'update'])->name('password.update');
});

Route::middleware('auth')->group(function() {
    Route::get('email-verify', [EmailVerificationController::class,'index'])->name('verification.notice');
    Route::get('email-verify/{id}/{hash}', [EmailVerificationController::class,'store'])
        ->middleware('signed')
        ->name('verification.verify');
    Route::post('resend-verification', ResendEmailVerificationLinkController::class)
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('logout', [UserAuthenticationController::class,'destroy'])->name('logout');
});