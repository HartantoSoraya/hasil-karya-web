<?php

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

Route::get('/dashboard', [App\Http\Controllers\Web\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::resource('example', App\Http\Controllers\Web\Admin\ExampleController::class);

Route::resource('blog-tag', App\Http\Controllers\Web\Admin\BlogTagController::class);

Route::resource('blog-category', App\Http\Controllers\Web\Admin\BlogCategoryController::class);

Route::resource('project-category', App\Http\Controllers\Web\Admin\ProjectCategoryController::class);

Route::resource('contact', App\Http\Controllers\Web\Admin\ContactController::class);

Route::resource('banner', App\Http\Controllers\Web\Admin\BannerController::class);

Route::resource('frequently-asked-question', App\Http\Controllers\Web\Admin\FrequentlyAskedQuestionController::class);

Route::resource('blog', App\Http\Controllers\Web\Admin\BlogController::class);

Route::resource('service', App\Http\Controllers\Web\Admin\ServiceController::class);

Route::resource('testimonial', App\Http\Controllers\Web\Admin\TestimonialController::class);

Route::resource('project', App\Http\Controllers\Web\Admin\ProjectController::class);

Route::resource('client', App\Http\Controllers\Web\Admin\ClientController::class);

Route::resource('customer-service', App\Http\Controllers\Web\Admin\CustomerServiceController::class);