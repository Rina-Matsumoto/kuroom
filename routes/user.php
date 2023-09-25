<?php

use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\Auth\ConfirmablePasswordController;
use App\Http\Controllers\User\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\User\Auth\EmailVerificationPromptController;
use App\Http\Controllers\User\Auth\NewPasswordController;
use App\Http\Controllers\User\Auth\PasswordController;
use App\Http\Controllers\User\Auth\PasswordResetLinkController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\User\Auth\VerifyEmailController;
use App\Http\Controllers\UserClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users', 'verified'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
        Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/index', [UserClassroomController::class ,'index'])->name('index');
        Route::get('/timetable', [UserClassroomController::class ,'timetable'])->name('timetable');
        Route::get('/index/{day}/{time}', [UserClassroomController::class ,'index']);
        Route::get('/showsubject/{day}/{time}', [UserClassroomController::class ,'showsubject']);
        Route::get('/show/{day}/{time}', [UserClassroomController::class ,'show']);
        Route::get('/create', [SubjectController::class ,'create']);
        Route::post('/create', [SubjectController::class, 'store']);
        Route::get('/comment/{classroom}', [CommentController::class, 'index'])->name('comment');
        Route::post('/comment/{classroom}', [CommentController::class, 'store'])->name('store');
        Route::get('/result/ajax/{classroom}', [CommentController::class, 'getData'])->name('store');
        Route::get('/result/ajax/{classroom}', [CommentController::class, 'getData']);
});

Route::middleware('guest:users')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //             ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:users')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    
    
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

Route::put('password', [PasswordController::class, 'update'])->name('password.update');