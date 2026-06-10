<?php

use App\Http\Controllers\Admin\Conocenos\ClientsController as AdminClientsController;
use App\Http\Controllers\Admin\Conocenos\TestimonialsController as AdminTestimonialsController;
use App\Http\Controllers\Admin\Conocenos\DifferentiatorsController as AdminDifferentiatorsController;
use App\Http\Controllers\Admin\Conocenos\HeroController as AdminHeroController;
use App\Http\Controllers\Admin\Conocenos\PillarsController as AdminPillarsController;
use App\Http\Controllers\Admin\Conocenos\SupportController as AdminSupportController;
use App\Http\Controllers\Admin\Conocenos\CareersController as AdminCareersController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\ConocenosController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Public website routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/productos', [PublicController::class, 'productos'])->name('productos');
Route::get('/conocenos', [ConocenosController::class, 'index'])->name('conocenos');
Route::get('/contacto', fn() => view('contacto'))->name('contacto');
Route::get('/fabrica', [PublicController::class, 'fabrica'])->name('fabrica');
Route::get('/nearshoring', [PublicController::class, 'nearshoring'])->name('nearshoring');
Route::get('/blog', [PublicController::class, 'blog'])->name('blog');
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

    // Inicio — section editors
    Route::prefix('inicio')->name('inicio.')->group(function () {
        Route::get('/hero',             [\App\Http\Controllers\Admin\Inicio\HeroController::class, 'edit'])->name('hero.edit');
        Route::post('/hero',            [\App\Http\Controllers\Admin\Inicio\HeroController::class, 'update'])->name('hero.update');
        Route::get('/nosotros',         [\App\Http\Controllers\Admin\Inicio\NosotrosController::class, 'edit'])->name('nosotros.edit');
        Route::post('/nosotros',        [\App\Http\Controllers\Admin\Inicio\NosotrosController::class, 'update'])->name('nosotros.update');
        Route::get('/services_intro',   [\App\Http\Controllers\Admin\Inicio\ServicesIntroController::class, 'edit'])->name('services_intro.edit');
        Route::post('/services_intro',  [\App\Http\Controllers\Admin\Inicio\ServicesIntroController::class, 'update'])->name('services_intro.update');
        Route::get('/cta',              [\App\Http\Controllers\Admin\Inicio\CtaController::class, 'edit'])->name('cta.edit');
        Route::post('/cta',             [\App\Http\Controllers\Admin\Inicio\CtaController::class, 'update'])->name('cta.update');
        Route::get('/devops',           [\App\Http\Controllers\Admin\Inicio\DevopsController::class, 'edit'])->name('devops.edit');
        Route::post('/devops',          [\App\Http\Controllers\Admin\Inicio\DevopsController::class, 'update'])->name('devops.update');
        Route::get('/onshoring',        [\App\Http\Controllers\Admin\Inicio\OnshoringController::class, 'edit'])->name('onshoring.edit');
        Route::post('/onshoring',       [\App\Http\Controllers\Admin\Inicio\OnshoringController::class, 'update'])->name('onshoring.update');
        Route::get('/calidad',          [\App\Http\Controllers\Admin\Inicio\CalidadController::class, 'edit'])->name('calidad.edit');
        Route::post('/calidad',         [\App\Http\Controllers\Admin\Inicio\CalidadController::class, 'update'])->name('calidad.update');
        Route::get('/valor',            [\App\Http\Controllers\Admin\Inicio\ValorController::class, 'edit'])->name('valor.edit');
        Route::post('/valor',           [\App\Http\Controllers\Admin\Inicio\ValorController::class, 'update'])->name('valor.update');
        Route::get('/equipo',           [\App\Http\Controllers\Admin\Inicio\EquipoController::class, 'edit'])->name('equipo.edit');
        Route::post('/equipo',          [\App\Http\Controllers\Admin\Inicio\EquipoController::class, 'update'])->name('equipo.update');
        Route::get('/tecnologias',      [\App\Http\Controllers\Admin\Inicio\TecnologiasController::class, 'edit'])->name('tecnologias.edit');
        Route::post('/tecnologias',     [\App\Http\Controllers\Admin\Inicio\TecnologiasController::class, 'update'])->name('tecnologias.update');
        Route::get('/capacitacion',     [\App\Http\Controllers\Admin\Inicio\CapacitacionController::class, 'edit'])->name('capacitacion.edit');
        Route::post('/capacitacion',    [\App\Http\Controllers\Admin\Inicio\CapacitacionController::class, 'update'])->name('capacitacion.update');
        Route::get('/acompanamiento',   [\App\Http\Controllers\Admin\Inicio\AcompanamientoController::class, 'edit'])->name('acompanamiento.edit');
        Route::post('/acompanamiento',  [\App\Http\Controllers\Admin\Inicio\AcompanamientoController::class, 'update'])->name('acompanamiento.update');
        Route::get('/ecosistema',       [\App\Http\Controllers\Admin\Inicio\EcosistemaController::class, 'edit'])->name('ecosistema.edit');
        Route::post('/ecosistema',      [\App\Http\Controllers\Admin\Inicio\EcosistemaController::class, 'update'])->name('ecosistema.update');
        Route::get('/rse',              [\App\Http\Controllers\Admin\Inicio\RseController::class, 'edit'])->name('rse.edit');
        Route::post('/rse',             [\App\Http\Controllers\Admin\Inicio\RseController::class, 'update'])->name('rse.update');
        Route::get('/bituyu_preview',   [\App\Http\Controllers\Admin\Inicio\BituyuPreviewController::class, 'edit'])->name('bituyu_preview.edit');
        Route::post('/bituyu_preview',  [\App\Http\Controllers\Admin\Inicio\BituyuPreviewController::class, 'update'])->name('bituyu_preview.update');
        Route::get('/proceso',          [\App\Http\Controllers\Admin\Inicio\ProcesoController::class, 'edit'])->name('proceso.edit');
        Route::post('/proceso',         [\App\Http\Controllers\Admin\Inicio\ProcesoController::class, 'update'])->name('proceso.update');
        Route::get('/stack',            [\App\Http\Controllers\Admin\Inicio\StackController::class, 'edit'])->name('stack.edit');
        Route::post('/stack',           [\App\Http\Controllers\Admin\Inicio\StackController::class, 'update'])->name('stack.update');
    });

    // Fábrica — section editors
    Route::prefix('fabrica')->name('fabrica.')->group(function () {
        Route::get('/hero',                 [\App\Http\Controllers\Admin\Fabrica\HeroController::class, 'edit'])->name('hero.edit');
        Route::post('/hero',                [\App\Http\Controllers\Admin\Fabrica\HeroController::class, 'update'])->name('hero.update');
        Route::get('/services_overview',   [\App\Http\Controllers\Admin\Fabrica\ServicesOverviewController::class, 'edit'])->name('services_overview.edit');
        Route::post('/services_overview',  [\App\Http\Controllers\Admin\Fabrica\ServicesOverviewController::class, 'update'])->name('services_overview.update');
        Route::get('/servicios',            [\App\Http\Controllers\Admin\Fabrica\ServiciosController::class, 'edit'])->name('servicios.edit');
        Route::get('/servicios/{id}/edit',  [\App\Http\Controllers\Admin\Fabrica\ServiciosController::class, 'editItem'])->name('servicios.editItem');
        Route::post('/servicios/{id}',      [\App\Http\Controllers\Admin\Fabrica\ServiciosController::class, 'updateItem'])->name('servicios.updateItem');
        Route::get('/band',                 [\App\Http\Controllers\Admin\Fabrica\BandController::class, 'edit'])->name('band.edit');
        Route::post('/band',                [\App\Http\Controllers\Admin\Fabrica\BandController::class, 'update'])->name('band.update');
    });

    // Nearshoring — section editors
    Route::prefix('nearshoring')->name('nearshoring.')->group(function () {
        Route::get('/hero',             [\App\Http\Controllers\Admin\Nearshoring\HeroController::class, 'edit'])->name('hero.edit');
        Route::post('/hero',            [\App\Http\Controllers\Admin\Nearshoring\HeroController::class, 'update'])->name('hero.update');
        Route::get('/propuesta',        [\App\Http\Controllers\Admin\Nearshoring\PropuestaController::class, 'edit'])->name('propuesta.edit');
        Route::post('/propuesta',       [\App\Http\Controllers\Admin\Nearshoring\PropuestaController::class, 'update'])->name('propuesta.update');
        Route::get('/ventajas',         [\App\Http\Controllers\Admin\Nearshoring\VentajasController::class, 'edit'])->name('ventajas.edit');
        Route::post('/ventajas',        [\App\Http\Controllers\Admin\Nearshoring\VentajasController::class, 'update'])->name('ventajas.update');
        Route::get('/proceso',          [\App\Http\Controllers\Admin\Nearshoring\ProcesoController::class, 'edit'])->name('proceso.edit');
        Route::post('/proceso',         [\App\Http\Controllers\Admin\Nearshoring\ProcesoController::class, 'update'])->name('proceso.update');
    });

    // Blog — section editors
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/header',  [\App\Http\Controllers\Admin\Blog\HeaderController::class, 'edit'])->name('header.edit');
        Route::post('/header', [\App\Http\Controllers\Admin\Blog\HeaderController::class, 'update'])->name('header.update');
        Route::get('/posts',   [\App\Http\Controllers\Admin\Blog\PostsController::class, 'edit'])->name('posts.edit');
        Route::post('/posts',  [\App\Http\Controllers\Admin\Blog\PostsController::class, 'update'])->name('posts.update');
    });

    // Productos — section editors
    Route::prefix('productos')->name('productos.')->group(function () {
        Route::get('/hero',             [\App\Http\Controllers\Admin\Productos\HeroController::class, 'edit'])->name('hero.edit');
        Route::post('/hero',            [\App\Http\Controllers\Admin\Productos\HeroController::class, 'update'])->name('hero.update');
        Route::get('/intro',            [\App\Http\Controllers\Admin\Productos\IntroController::class, 'edit'])->name('intro.edit');
        Route::post('/intro',           [\App\Http\Controllers\Admin\Productos\IntroController::class, 'update'])->name('intro.update');
        Route::get('/servicios',        [\App\Http\Controllers\Admin\Productos\ProductsController::class, 'edit'])->name('servicios.edit');
        Route::get('/servicios/{key}/edit', [\App\Http\Controllers\Admin\Productos\ProductsController::class, 'editItem'])->name('servicios.editItem');
        Route::post('/servicios/{key}',     [\App\Http\Controllers\Admin\Productos\ProductsController::class, 'updateItem'])->name('servicios.updateItem');
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
        Route::get('/careers',          [AdminCareersController::class, 'edit'])->name('careers.edit');
        Route::post('/careers',         [AdminCareersController::class, 'update'])->name('careers.update');
    });
});

require __DIR__.'/auth.php';
