<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\titi2Controller;
use App\Http\Controllers\LivreController;

Route::get('/', function () {
    return view('welcome');
}); // route static sans besoin de controller

// Route::get('/pageac', function () {
//     return view('index');
// });

Route::get('/livre', [PageController::class, 'livre'])->name('voir');

Route::get('/verstiti', [titi2Controller::class, 'affichetiti']); 

//route pour

Route::get('/livres', [LivreController::class, 'aflivre'])->name('aflivre');

// Route pour afficher le formulaire

Route::get('/livres/ajouter', [LivreController::class, 'formlivre'])->name('livres.create');

//route pour formulaire

Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');

Route::get('/livres/{id}/edit', [LivreController::class, 'edit'])->name('livres.edit');
Route::put('/livres/{id}', [LivreController::class, 'update'])->name('livres.update');
Route::delete('/livres/{id}', [LivreController::class, 'destroy'])->name('livres.destroy');

Route::get('/livres/{id}', [LivreController::class, 'show'])->name('livres.show');