<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //la route aflivre a été deplacé dans route middleware pour forcer à venir s'authentifier
    Route::get('/', [LivreController::class, 'aflivre'])->name('aflivre');
});

require __DIR__.'/auth.php';



// Route pour afficher le formulaire

Route::get('/livres/ajouter', [LivreController::class, 'formlivre'])->name('livres.create');


//route pour formulaire
Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');

Route::get('/livres/{id}/edit', [LivreController::class, 'edit'])->name('livres.edit');
Route::put('/livres/{id}', [LivreController::class, 'update'])->name('livres.update');
Route::delete('/livres/{id}', [LivreController::class, 'destroy'])->name('livres.destroy');

Route::get('/livres/{id}', [LivreController::class, 'show'])->name('livres.show');




