<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController as ProfileOfAdminController;

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function(){
    require __DIR__.'/admin.php';
});