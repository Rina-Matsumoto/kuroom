<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EmptyRoomController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservedController;
use App\Http\Controllers\CommentedController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/schools', [SchoolController::class, 'index']);
Route::get('/campuses', [CampusController::class, 'index']);
Route::get('/days', [DayController::class, 'index']);
Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::get('/empty_rooms', [EmptyRoomController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/comments', [CommentController::class, 'index']);
Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/reserveds', [ReservedController::class, 'index']);
Route::get('/commenteds', [CommentedController::class, 'index']);


