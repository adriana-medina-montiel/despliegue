<?php

use App\Http\Controllers\Admin\Conocenos\ClientsController as AdminClientsController;
use App\Http\Controllers\Admin\Conocenos\TestimonialsController as AdminTestimonialsController;
use App\Http\Controllers\Admin\Conocenos\DifferentiatorsController as AdminDifferentiatorsController;
use App\Http\Controllers\Admin\Conocenos\HeroController as AdminHeroController;
use App\Http\Controllers\Admin\Conocenos\PillarsController as AdminPillarsController;
use App\Http\Controllers\Admin\Conocenos\SupportController as AdminSupportController;
use App\Http\Controllers\Admin\Nearshoring\HeroController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\ConocenosController;
use Illuminate\Support\Facades\Route;

// Public website routes
Route::get('/', fn() => view('home'))->name('home');
Route::get('/productos', fn() => view('productos'))->name('productos');
Route::get('/conocenos', [ConocenosController::class, 'index'])->name('conocenos');
Route::get('/contacto', fn() => view('contacto'))->name('contacto');
Route::get('/fabrica', fn() => view('fabrica'))->name('fabrica');
Route::get('/nearshoring', fn() => view('nearshoring'))->name('nearshoring');
Route::get('/blog', fn() => view('blog.index', ['posts' => collect()]))->name('blog');
Route::get('/blog/{slug}', fn($slug) => abort(404))->name('blog.show');

// Admin panel — protected by auth + admin middleware
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/inicio',      [PageController::class, 'inicio'])->name('inicio');
        Route::get('/fabrica',     [PageController::class, 'fabrica'])->name('fabrica');
        Route::get('/nearshoring', [PageController::class, 'nearshoring'])->name('nearshoring');
        Route::get('/productos',   [PageController::class, 'productos'])->name('productos');
        Route::get('/blog',        [PageController::class, 'blog'])->name('blog');
        Route::get('/conocenos',   [PageController::class, 'conocenos'])->name('conocenos');
    });

    // Conócenos — section editors
    Route::prefix('conocenos')->name('conocenos.')->group(function () {
        Route::get('/hero',             [AdminHeroController::class, 'edit'])->name('hero.edit');
        Route::post('/hero',            [AdminHeroController::class, 'update'])->name('hero.update');
        Route::get('/differentiators',  [AdminDifferentiatorsController::class, 'edit'])->name('differentiators.edit');
        Route::post('/differentiators', [AdminDifferentiatorsController::class, 'update'])->name('differentiators.update');
        Route::get('/pillars',          [AdminPillarsController::class, 'edit'])->name('pillars.edit');
        Route::post('/pillars',         [AdminPillarsController::class, 'update'])->name('pillars.update');
        Route::get('/support',          [AdminSupportController::class, 'edit'])->name('support.edit');
        Route::post('/support',         [AdminSupportController::class, 'update'])->name('support.update');
        Route::get('/clients',          [AdminClientsController::class, 'edit'])->name('clients.edit');
        Route::post('/clients',         [AdminClientsController::class, 'update'])->name('clients.update');
        Route::get('/testimonials',     [AdminTestimonialsController::class, 'edit'])->name('testimonials.edit');
        Route::post('/testimonials',    [AdminTestimonialsController::class, 'update'])->name('testimonials.update');
    });

  
   
        Route::prefix('nearshoring')->name('nearshoring.')->group(function () {
            
            Route::get('/hero', [\App\Http\Controllers\Admin\Nearshoring\HeroController::class, 'edit'])->name('hero.edit');
            Route::post('/hero', [\App\Http\Controllers\Admin\Nearshoring\HeroController::class, 'update'])->name('hero.update');
           Route::get('/onshoring', [\App\Http\Controllers\Admin\Nearshoring\OnshoringController::class, 'edit'])->name('onshoring.edit');
           Route::post('/onshoring', [\App\Http\Controllers\Admin\Nearshoring\OnshoringController::class, 'update'])->name('onshoring.update');
        });
  


});

require __DIR__.'/auth.php';
