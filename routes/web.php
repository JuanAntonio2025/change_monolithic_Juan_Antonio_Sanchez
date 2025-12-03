<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';
