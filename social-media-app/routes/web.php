<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileViewController;
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

Route::get('/dashboard', [DashboardController::class, 'everyControll'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::patch('/post/add', [PostController::class, 'addPost'])->name('post.add');
Route::get('/post/delete/{postid}', [PostController::class, 'deletePost'])->name('post.delete');
Route::patch('/post/edit/{postid}', [PostController::class, 'editPost'])->name('post.edit');


// Route::post('/posts/{postId}/toggle-like/{status}', [LikeController::class, 'like'])->name('toggle.like');
Route::get('/post/like/add/{postid}', [LikeController::class, 'likePost'])->name('toggle.like');
Route::get('/post/like/remove/{postid}', [LikeController::class, 'dislikePost'])->name('toggle.like');

Route::get('/follower/add/{userid}', [FollowController::class, 'followerAdd'])->name('follower.add');
Route::get('/follower/remove/{userid}', [FollowController::class, 'followerRemove'])->name('follower.remove');

Route::get('only/{userid}',[ProfileViewController::class,'show']);


// Route::get('/demo',[DashboardController::class, 'demo']);  -> This is for checking purpose

require __DIR__.'/auth.php';
