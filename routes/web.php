<?php

use App\Http\Controllers\Web\App\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('app.landing');

Route::get('/layanan', [LandingController::class, 'services'])->name('app.services');
Route::get('/layanan/{slug}', [LandingController::class, 'serviceDetail'])->name('app.service');
