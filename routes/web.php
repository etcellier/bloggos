<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts', [PostController::class, 'list'])->middleware(['auth', 'verified'])->name('posts.list');

Route::get('/posts/add', function () {
    $categories = \App\Models\Category::class::all();
    $tags = \App\Models\Tag::class::all();
    return view('posts.add', ["categories" => $categories, "tags" => $tags]);
})->middleware(['auth', 'verified'])->name('posts.add');

Route::post('/posts/add', [PostController::class, 'add'])->middleware(['auth', 'verified'])->name('posts.add');

Route::get('/posts/edit/{id}', function ($id) {
    $post = Post::find($id);
    $categories = \App\Models\Category::class::all();
    $tags = \App\Models\Tag::class::all();
    return view('posts.edit', ["post" => $post, "categories" => $categories, "tags" => $tags]);
})->middleware(['auth', 'verified'])->name('posts.update');

Route::post('/posts/edit/{id}', [PostController::class, "update"])->middleware(['auth', 'verified'])->name('posts.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/categories', [CategoryController::class, 'list'])->middleware(['auth', 'verified'])->name('category.list');
Route::get('/categories/add', function () {
    return view('category.add');
})->middleware(['auth', 'verified'])->name('category.add');
Route::post('/categories/add', [CategoryController::class, 'add'])->middleware(['auth', 'verified'])->name('category.add');
Route::get('/categories/edit/{id}', function ($id) {
    $category = Category::find($id);
    return view('category.edit', ["category" => $category]);
})->middleware(['auth', 'verified'])->name('category.update');
Route::post('/categories/edit/{id}', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('category.update');

Route::get('/tags', [TagController::class, 'list'])->middleware(['auth', 'verified'])->name('tag.list');
Route::get('/tags/add', function () {
    return view('tag.add');
})->middleware(['auth', 'verified'])->name('tag.add');
Route::post('/tags/add', [TagController::class, 'add'])->middleware(['auth', 'verified'])->name('tag.add');
Route::get('/tags/edit/{id}', function ($id) {
    $tag = Tag::find($id);
    return view('tag.edit', ["tag" => $tag]);
})->middleware(['auth', 'verified'])->name('tag.update');
Route::post('/tags/edit/{id}', [TagController::class, 'update'])->middleware(['auth', 'verified'])->name('tag.update');

require __DIR__ . '/auth.php';
