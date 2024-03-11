<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('applicant/login', [UserController::class, 'showLoginForm'])->name('applicant.login');
Route::get('/applicant/login/{post_id?}', [UserController::class, 'showLoginForm'])->name('applicant.login');
Route::post('/applicant/login', [UserController::class, 'login'])->name('applicant.login');

Route::get('applicant/register', [UserController::class, 'create'])->name('applicant.register');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');


Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/applicant/apply/{post_id}', [ApplicantController::class, 'create'])->name('applicant.apply');
Route::post('/applicant/apply', [ApplicantController::class, 'store'])->name('applicant.store');

Route::middleware('auth')->get('/notifications/{notification}', 'UserController@showNotification')->name('notifications.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
    Route::get('/admin/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');

    Route::get('/sifting-cv/posts/{post}', [AdminController::class, 'getPostDetails'])->name('sifting.cv');
    Route::get('/admin/sifting-cv', [AdminController::class, 'siftingCV'])->name('admin.sifting.cv');
    Route::get('/admin/closed-posts', [AdminController::class, 'closedPosts'])->name('admin.closed.posts');
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('/admin/auditing', [AdminController::class, 'auditing'])->name('admin.auditing');

    Route::get('/admin/view-cv/{applicantId}', 'AdminController@viewCV')->name('admin.view.cv');

    Route::get('/admin/download-cv/{cvFileName}', [AdminController::class, 'downloadCV'])->name('download.cv');
});
