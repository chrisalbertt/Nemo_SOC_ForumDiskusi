<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

// =========================
// Halaman awal
// =========================
Route::get('/', function () {
    return redirect()->route('forum.index');
});

// =========================
// AUTH
// =========================
Route::get('/login',    [AuthController::class, 'loginForm'])->name('login');
Route::post('/login',   [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register',[AuthController::class, 'registerPost'])->name('register.post');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

// =========================
// DASHBOARD
// =========================
Route::get('/dashboard/user',  [DashboardController::class,'user'])->name('user.dashboard');
Route::get('/dashboard/admin', [DashboardController::class,'admin'])->name('admin.dashboard');

// =========================
// FORUM (User)
// =========================
Route::get('/forum',             [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/create',      [ForumController::class, 'create'])->name('forum.create');
Route::post('/forum',            [ForumController::class, 'store'])->name('forum.store');
Route::get('/forum/{id}',        [ForumController::class, 'show'])->name('forum.show');
Route::get('/forum/{id}/edit',   [ForumController::class, 'edit'])->name('forum.edit');
Route::put('/forum/{id}',        [ForumController::class, 'update'])->name('forum.update');
Route::delete('/forum/{id}',     [ForumController::class, 'destroy'])->name('forum.destroy');

// komentar
Route::post('/forum/{id}/comment', [ForumController::class, 'comment'])->name('forum.comment');
Route::delete('/komen/{id}',       [ForumController::class, 'deleteComment'])->name('forum.comment.delete');

// =========================
// ADMIN
// =========================
Route::get('/admin/users',           [AdminController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create',    [AdminController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users',          [AdminController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');   // NEW
Route::put('/admin/users/{id}',      [AdminController::class, 'update'])->name('admin.users.update'); // NEW
Route::delete('/admin/users/{id}',   [AdminController::class, 'destroy'])->name('admin.users.destroy');

// Kelola Topik (opsional)
Route::get('/admin/topics',          [AdminController::class,'topics'])->name('admin.topics.index');
Route::get('/admin/topics/{id}',     [AdminController::class,'manageTopic'])->name('admin.topics.manage');
Route::delete('/admin/topics/{id}',  [AdminController::class,'destroyTopic'])->name('admin.topics.destroy');
Route::delete('/admin/comments/{id}',[AdminController::class,'destroyComment'])->name('admin.comments.destroy');
