<?php

use GuzzleHttp\Middleware;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::resource('/post','PostController');
Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/show/{post:slug}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route');
    Route::get('demo',function(){
        return 'authoried';
    });


});
