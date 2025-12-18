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
    Route::get('petitions/{petition}/edit', [\App\Http\Controllers\PetitionController::class, 'edit'])->name('petitions.edit');
    Route::put('petitions/{petition}', [\App\Http\Controllers\PetitionController::class, 'update'])->name('petitions.update');
    Route::delete('petitions/{petition}', [\App\Http\Controllers\PetitionController::class, 'delete'])->name('petitions.delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(\App\Http\Controllers\PetitionController::class)->group(function () {
    Route::get('petitions', 'index')->name('petitions.index');
    Route::get('petitions/{id}', 'show')->name('petitions.show');
});


//Funciones del admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\PageController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin/petitions')
    ->name('admin.petitions.')
    ->controller(AdminPetitionsController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show', 'show')->name('show');
        Route::get('/details/{id}', 'details')->where('id', '[0-9]+')->name('details');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/actualizar/{id}', 'update')->name('update');
        Route::delete('/delete/{file_id}', 'delete')->where('file_id', '[0-9]+')->name('delete');
        Route::delete('/{id}', 'deletePetition')->where('id', '[0-9]+')->name('deletePetition');
        Route::put('/estado/{id}', 'cambiarEstado')->name('estado');
    });

Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin/users')
    ->name('admin.users.')
    ->controller(\App\Http\Controllers\AdminUsersController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('delete');
    });

Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin/categories')
    ->name('admin.categories.')
    ->controller(\App\Http\Controllers\AdminCategoriesController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'deleteCategory')->name('delete');
    });

require __DIR__.'/auth.php';
