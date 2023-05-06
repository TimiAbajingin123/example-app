<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/create', function () {
    return view('create');
})->name('create');

Route::get('/users', [UserController::class, 'index'])->name('users');

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::PUT('/posts/{id}/update', [PostController::class, 'update']);




Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::delete('/posts/{id}/delete', [PostController::class, 'destroy']);


Route::get('/posts/{id}', [PostController::class, 'show']);

Route::get('/comments/{id}', [CommentController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
