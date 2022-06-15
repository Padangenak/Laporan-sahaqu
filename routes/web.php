<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers;

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


Route::get('/', [Controllers\participantcontroller::class, 'index']);
Route::post('tahajjud', [Controllers\reportcontroller::class, 'tahajjud']);
Route::post('dhuha', [Controllers\reportcontroller::class, 'dhuha']);

Route::group(['middleware' => 'guest'], function () {
    Route::post('/login', [Controllers\Auth\AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin'], function () {
    Route::group(['prefix' => 'participant', 'as' => '.participant'], function () {
        Route::get('/', [Admin\participantcontroller::class, 'index']);
        Route::get('/create', [Admin\participantcontroller::class, 'create'])->name('.create');
        Route::post('/create', [Admin\participantcontroller::class, 'createPost'])->name('.create');
    });

    Route::get('/', [Admin\DashboardController::class, 'index']);
    Route::post('/logout', [Controllers\Auth\AuthController::class, 'logout'])->name('.logout');
});
