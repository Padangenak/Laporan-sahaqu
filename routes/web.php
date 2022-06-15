<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\participantcontroller;
use App\Http\Controllers\reportcontroller;

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

Route::get('/', [participantcontroller::class, 'index']);
Route::post('tahajjud', [reportcontroller::class, 'tahajjud']);
Route::post('dhuha', [reportcontroller::class, 'dhuha']);