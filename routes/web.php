<?php

use Illuminate\Support\Facades\Route;
//use ProfileController;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit');
    Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');

    Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post');
    Route::post('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('create');
    Route::get('/post/show', [App\Http\Controllers\PostController::class, 'show'])->name('show');
    Route::delete('/post/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delete');

    Route::get('/search', [App\Http\Controllers\AddFriendController::class, 'search'])->name('search');
    Route::post('/search/add', [App\Http\Controllers\AddFriendController::class, 'create'])->name('add');

    Route::get('/friends', [App\Http\Controllers\AddFriendController::class, 'show'])->name('friends');

    Route::get('/test', function () {
      return auth()->user()->friends->pluck('friend_id');
    });

});
