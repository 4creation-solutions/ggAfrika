<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\isAdmin;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name(
    'home'
);
Route::get('/about', [
    App\Http\Controllers\HomeController::class,
    'about',
])->name('about');
Route::get('/support', [
    App\Http\Controllers\HomeController::class,
    'support',
])->name('support');
Route::get('/advertising', [
    App\Http\Controllers\HomeController::class,
    'advertising',
])->name('advertising');
Route::get('/documentation', [
    App\Http\Controllers\HomeController::class,
    'doc',
])->name('doc');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminHome'])
    ->name('admin')
    ->middleware('auth');

//EDITORS
Route::get('/admin/all-editor', [
    App\Http\Controllers\AdminController::class,
    'index',
])
    ->name('editors')
    ->middleware('auth');
Route::put('/admin/editor/update', [
    App\Http\Controllers\Auth\RegisterController::class,
    'update',
])
    ->name('updateUser')
    ->middleware('auth');
Route::delete('/admin/user/delete/{user}', [
    App\Http\Controllers\Auth\RegisterController::class,
    'destroy',
])
    ->name('deleteUser')
    ->middleware('auth');

//CATEGORY
Route::get('/category/{category}', [
    App\Http\Controllers\CategoryController::class,
    'showcat',
])->name('showcat');
Route::get('/admin/category', [
    App\Http\Controllers\CategoryController::class,
    'allCategory',
])
    ->name('category')
    ->middleware('auth');

Route::get('/admin/category/create', [
    App\Http\Controllers\CategoryController::class,
    'create',
])
    ->name('createCategory')
    ->middleware('auth');
Route::post('/admin/create/category', [
    App\Http\Controllers\CategoryController::class,
    'store',
])
    ->name('newCat')
    ->middleware('auth');
Route::delete('/admin/delete/category/{cat}', [
    App\Http\Controllers\CategoryController::class,
    'destroy',
])
    ->name('deleteCategory')
    ->middleware('auth');

//BLOG
Route::get('/blog/{post}', [
    App\Http\Controllers\PostsController::class,
    'show',
])->name('show');
Route::get('/admin/posts', [
    App\Http\Controllers\PostsController::class,
    'showPosts',
])
    ->name('posts')
    ->middleware('auth');
Route::get('/admin/edit/{post}', [
    App\Http\Controllers\PostsController::class,
    'edit',
])
    ->name('edit')
    ->middleware('auth');
Route::post('/admin/store', [
    App\Http\Controllers\PostsController::class,
    'store',
])
    ->name('store')
    ->middleware('auth');
Route::get('/admin/create/post', [
    App\Http\Controllers\PostsController::class,
    'create',
])
    ->name('create')
    ->middleware('auth');
Route::put('/admin/blog/publish/{post}', [
    App\Http\Controllers\PostsController::class,
    'publish',
])
    ->name('publish')
    ->middleware('auth');
Route::put('/admin/blog/{post}', [
    App\Http\Controllers\PostsController::class,
    'update',
])
    ->name('update')
    ->middleware('auth');
Route::delete('/admin/delete/{post}', [
    App\Http\Controllers\PostsController::class,
    'destroy',
])
    ->name('delete')
    ->middleware('auth');

//VIDEOS

Route::post('/admin/store/video', [
    App\Http\Controllers\VideoController::class,
    'store',
])
    ->name('store_video')
    ->middleware('auth');
Route::get('/admin/videos', [
    App\Http\Controllers\VideoController::class,
    'index',
])
    ->name('allvideos')
    ->middleware('auth');
Route::delete('/admin/video/delete/{video}', [
    App\Http\Controllers\VideoController::class,
    'destroy',
])
    ->name('delete_video')
    ->middleware('auth');
Route::put('/admin/video/{post}/remove', [
    App\Http\Controllers\VideoController::class,
    'publish',
])
    ->name('v_publish')
    ->middleware('auth');
