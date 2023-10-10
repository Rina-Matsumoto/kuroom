<?php

//use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\NewPasswordController;
//use App\Http\Controllers\ProfileController as ProfileOfAdminController;





Route::get('/', function () {
    return view('user.auth.login');
});

Route::get('/admin', function () {
    return view('admin.auth.login');
});

 Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');


Route::prefix('admin')->name('admin.')->group(function(){
    require __DIR__.'/admin.php';
});

Route::prefix('user')->name('user.')->group(function(){
    require __DIR__.'/user.php';
});