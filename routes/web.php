<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


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
    $posts = [];
    if(auth()->check()) {
        $posts = auth()->user()->posts()->latest()->get();
    }
    // $posts = Post::where('user_id', auth()->id())->get();
    return view('home',['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/posts/add', [PostController::class, 'add']);
Route::get('/posts/{post}/edit', [PostController::class, 'editView']);
Route::put('/posts/{post}/edit-action',[PostController::class, 'editAction']);
Route::delete('/posts/{post}/delete',[PostController::class, 'delete']);
// Route::get('posts')