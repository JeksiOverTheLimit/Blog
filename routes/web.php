<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;

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

Route::get('/', [PostController::class, 'showPost']);

Route::get('/register', [UserController::class , 'showRegisterPage']);

Route::get('/log', [UserController::class, 'showLoginPage']);

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/showCreate', [PostController::class, 'showCreate'])->middleware('auth');

Route::get('/wishlist/{userId}', [WishlistController::class, 'showWishlistPage'])->middleware('auth')->name('wishlist');

Route::get('/{postId}', [PostController::class, 'showSinglePage']);

Route::get('/posts/{userId}', [PostController::class, 'showMyPostPage'])->middleware('auth');

Route::get('/edit/{postId}', [PostController::class, 'showUpdatePage'])->middleware('auth');

Route::get('/delete/{postId}', [PostController::class, 'delete'])->middleware('auth');

Route::get('editComment/{commentId}', [CommentController::class, 'showUpdatePage'])->middleware('auth');

Route::get('deleteComment/{commentId}', [CommentController::class, 'delete'])->middleware('auth');

Route::post('/create' , [PostController::class, 'create'])->middleware('auth'); 

Route::post('/register', [UserController::class, 'create']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/update/{postId}', [PostController::class, 'update'])->middleware('auth');

Route::post('/comment' , [CommentController::class, 'create'])->middleware('auth');

Route::post('/updateComment/{commentId}', [CommentController::class, 'update'])->middleware('auth');

Route::post('/addToWishlist', [WishlistController::class, 'create'])->middleware('auth');

Route::post('/deleteWishList', [WishlistController::class, 'delete'])->middleware('auth');

