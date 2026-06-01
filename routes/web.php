<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public website routes
Route::get('/', fn() => view('home'))->name('home');
Route::get('/productos', fn() => view('productos'))->name('productos');
Route::get('/conocenos', fn() => view('conocenos'))->name('conocenos');
Route::get('/contacto', fn() => view('contacto'))->name('contacto');
Route::get('/fabrica', fn() => view('fabrica'))->name('fabrica');
Route::get('/nearshoring', fn() => view('nearshoring'))->name('nearshoring');
Route::get('/blog', fn() => view('blog.index', ['posts' => collect()]))->name('blog');
Route::get('/blog/{slug}', fn($slug) => abort(404))->name('blog.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
