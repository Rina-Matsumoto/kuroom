<?php

use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\User\UserProfileController;


Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users', 'verified'])->name('dashboard');

Route::middleware('auth:users')->controller(UserProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
});

Route::middleware('auth:users')->controller(UserClassroomController::class)->group(function () {   
        Route::get('/index', 'index')->name('index');
        Route::get('/timetable', 'timetable')->name('timetable');
        Route::get('/show/{day}/{time}', 'show');
});

Route::middleware('auth:users')->controller(SubjectController::class)->group(function () {   
        Route::get('/create','create');
        Route::post('/create', 'store');
        Route::get('/showsubject/{day}/{time}', 'showsubject');
        Route::post('/destroy/{id}', 'destroy')->name('subject.destroy');
});

Route::middleware('auth:users')->controller(CommentController::class)->group(function () {   
        Route::get('/comment/{classroom}', 'index')->name('comment');
        Route::post('/comment/{classroom}', 'store')->name('store');
        Route::post('/comment/{id}', 'destroy')->name('comment.destroy');
});        
        
Route::middleware('auth:users')->controller(ReserveController::class)->group(function () {   
        Route::get('/reserve/{classroom}', 'index')->name('reserve.index');
        Route::post('/reserve/{classroom}', 'show')->name('reserve.show');
        Route::post('/complete/{classroom}', 'store')->name('reserve.store');
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

Route::put('password', [PasswordController::class, 'update'])->name('password.update');