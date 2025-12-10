<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminPetitionsController;

Route::get('/', [\App\Http\Controllers\PageController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('mispeticiones', [\App\Http\Controllers\PetitionController::class, 'listMine'])->name('petitions.mine');
    Route::get('peticionesfirmadas', [\App\Http\Controllers\PetitionController::class, 'peticionesFirmadas'])->name('petitions.peticionesfirmadas');
    Route::get('petitions/create', [\App\Http\Controllers\PetitionController::class, 'create'])->name('peticiones.create');
    Route::post('petitions', [\App\Http\Controllers\PetitionController::class, 'store'])->name('petitions.store');
    Route::get('petitions/{id}', [\App\Http\Controllers\PetitionController::class, 'show'])->name('petitions.show');
    Route::post('petitions/{id}/sign', [\App\Http\Controllers\PetitionController::class, 'firmar'])->name('petitions.sign');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(\App\Http\Controllers\PetitionController::class)->group(function () {
    Route::get('petitions', 'index')->name('petitions.index');
    Route::get('petitions/{id}', 'show')->name('petitions.show');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\PageController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin/petitions') // todas las rutas empiezan con /admin/petitions
    ->name('admin.petitions.')
    ->controller(AdminPetitionsController::class)
    ->group(function () {

        // Dashboard/Listado de peticiones
        Route::get('/', 'index')->name('index');  // <--- aquí el GET

        // Ver todas las peticiones en tabla
        Route::get('/show', 'show')->name('show');

        // Crear una nueva petición
        Route::get('/create', 'create')->name('create');

        // Guardar la nueva petición
        Route::post('/', 'store')->name('store');

        // Editar petición existente
        Route::get('/edit/{id}', 'edit')->name('edit');

        // Actualizar petición
        Route::put('/{id}', 'update')->name('update');

        // Eliminar petición
        Route::delete('/{id}', 'deletePetition')->name('delete');

        // Cambiar estado de petición
        Route::put('/estado/{id}', 'cambiarEstado')->name('estado');
    });

Route::middleware(['auth', AdminMiddleware::class])->controller(\App\Http\Controllers\AdminUsersController::class)->group(function () {
    Route::get('admin/users/index', 'index')->name('admin.users.index');
});

Route::middleware(['auth', AdminMiddleware::class])->controller(\App\Http\Controllers\AdminCategoriesController::class)->group(function () {
    Route::get('admin/categories/index', 'index')->name('admin.categories.index');
});

require __DIR__.'/auth.php';
