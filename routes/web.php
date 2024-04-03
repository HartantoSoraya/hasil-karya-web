<?php

use App\Http\Controllers\Web\App\AboutController;
use App\Http\Controllers\Web\App\BlogController;
use App\Http\Controllers\Web\App\ContactController;
use App\Http\Controllers\Web\App\LandingController;
use App\Http\Controllers\Web\App\ProjectController;
use App\Http\Controllers\Web\App\ServiceController;
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
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('app.about');

Route::get('/blog', [BlogController::class, 'index'])->name('app.blogs');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('app.blog');
Route::get('/blog/kategori/{slug}', [BlogController::class, 'category'])->name('app.blog.category');
Route::get('/blog/tag/{slug}', [BlogController::class, 'tag'])->name('app.blog.tag');

Route::get('/proyek-kami', [ProjectController::class, 'index'])->name('app.projects');
Route::get('/proyek-kami/{slug}', [ProjectController::class, 'show'])->name('app.project');

Route::get('/layanan', [ServiceController::class, 'index'])->name('app.services');
Route::get('/layanan/{slug}', [ServiceController::class, 'show'])->name('app.service');

Route::get('/kontak-kami', [ContactController::class, 'index'])->name('app.contact');
Route::post('/kontak-kami', [ContactController::class, 'store'])->name('app.contact.store');
