<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::prefix('/admin')->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::prefix('/posts')->group(function() {
        Route::get('/', [PostController::class, 'list'])->middleware(['auth', 'verified'])->name('posts.list');

        Route::get('/add', function () {
            $categories = \App\Models\Category::class::all();
            $tags = \App\Models\Tag::class::all();
            return view('posts.add', ["categories" => $categories, "tags" => $tags]);
        })->middleware(['auth', 'verified'])->name('posts.add');

        Route::post('/add', [PostController::class, 'add'])->middleware(['auth', 'verified'])->name('posts.add');

        Route::get('/edit/{id}', function ($id) {
            $post = Post::find($id);
            $categories = \App\Models\Category::class::all();
            $tags = \App\Models\Tag::class::all();
            $selectedTags = $post->tags;
            $selectedTagsFormatted = [];
            foreach ($selectedTags as $tag) {
                $selectedTagsFormatted[] = $tag->id;
            }
            return view('posts.edit', ["post" => $post, "categories" => $categories, "tags" => $tags, "selectedTags" => $selectedTagsFormatted]);
        })->middleware(['auth', 'verified'])->name('posts.update');

        Route::post('/edit/{id}', [PostController::class, "update"])->middleware(['auth', 'verified'])->name('posts.update');
    });

    Route::prefix('/categories')->group(function() {
        Route::get('/', [CategoryController::class, 'list'])->middleware(['auth', 'verified'])->name('category.list');
        Route::get('/add', function () {
            return view('category.add');
        })->middleware(['auth', 'verified'])->name('category.add');
        Route::post('/add', [CategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('category.add');
        Route::get('/edit/{id}', function ($id) {
            $category = Category::find($id);
            return view('category.edit', ["category" => $category]);
        })->middleware(['auth', 'verified'])->name('category.update');
        Route::post('/edit/{id}', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('category.update');
    });

    Route::prefix('/tags')->group(function() {
        Route::get('/', [TagController::class, 'list'])->middleware(['auth', 'verified'])->name('tag.list');
        Route::get('/add', function () {
            return view('tag.add');
        })->middleware(['auth', 'verified'])->name('tag.add');
        Route::post('/add', [TagController::class, 'add'])->middleware(['auth', 'verified'])->name('tag.add');
        Route::get('/edit/{id}', function ($id) {
            $tag = Tag::find($id);
            return view('tag.edit', ["tag" => $tag]);
        })->middleware(['auth', 'verified'])->name('tag.update');
        Route::post('/edit/{id}', [TagController::class, 'update'])->middleware(['auth', 'verified'])->name('tag.update');
    });
});

// Front
Route::get('/', [HomeController::class, 'index'])->name('app.index');
Route::post('/', [CommentController::class, 'submit'])->name('app.index');
Route::get('/like', [LikeController::class, 'like'])->name('app.action.like');
Route::get('/unlike', [LikeController::class, 'unlike'])->name('app.action.unlike');

require __DIR__ . '/auth.php';
