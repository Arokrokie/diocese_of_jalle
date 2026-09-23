<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SermonController as AdminSermonController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::redirect('/about-us', '/about');
Route::redirect('/index.html', '/');

Route::get('/churches', [PageController::class, 'churches'])->name('churches');
Route::get('/leadership', [PageController::class, 'leadership'])->name('leadership');
Route::get('/bishop', [PageController::class, 'bishop'])->name('bishop');
Route::get('/clergy/{slug}', [PageController::class, 'clergyDetail'])->name('clergy.detail');

Route::get('/ministries', [PageController::class, 'ministries'])->name('ministries');
Route::get('/ministries/mothers-union', [PageController::class, 'ministryDetail'])->name('ministry.detail');

Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/holy-communion', [PageController::class, 'serviceDetail'])->name('service.detail');

Route::get('/sermons', [SermonController::class, 'index'])->name('sermons');
Route::get('/sermons/{slug}', [SermonController::class, 'show'])->name('sermons.show');
Route::get('/sermon/{slug}', [SermonController::class, 'show'])->name('sermon.show');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::redirect('/bible', '/gallery')->name('bible');

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event.show');

Route::get('/news', [PostController::class, 'index'])->name('news');
Route::get('/news/{slug}', [PostController::class, 'show'])->name('news.show');

Route::get('/donation', [PageController::class, 'donation'])->name('donation');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::redirect('/broadcast', '/sermons')->name('broadcast');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', AdminPostController::class);
    Route::resource('sermons', AdminSermonController::class);
    Route::resource('events', AdminEventController::class);
    Route::resource('gallery', AdminGalleryController::class);
    Route::get('messages', [AdminMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [AdminMessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
});
