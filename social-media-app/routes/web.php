<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
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

Route::get('/dashboard', [DashboardController::class, 'allPostshow'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::patch('/post/add', [PostController::class, 'addPost'])->name('post.add');
// Route::post('/posts/{postId}/toggle-like/{status}', [LikeController::class, 'like'])->name('toggle.like');
Route::get('/post/like/add/{postid}', [LikeController::class, 'likePost'])->name('toggle.like');
Route::get('/post/like/remove/{postid}', [LikeController::class, 'dislikePost'])->name('toggle.like');



Route::get('/demo',[DashboardController::class, 'demo']);

require __DIR__.'/auth.php';
