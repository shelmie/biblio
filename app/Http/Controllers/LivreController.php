<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Affiche la liste des livres.
     */
    public function aflivre()
    {
        // Récupère les livres récents avec pagination
        $livres = Livre::latest()->paginate(10);

        // Envoie à la vue "resources/views/livres/livres.blade.php"
        return view('livres.livres', compact('livres'));
    }

    /**
     * Affiche le formulaire d’ajout de livre.
     */
    public function formlivre()
    {
        return view('livres.form');
    }

    /**
     * Enregistre un nouveau livre.
     */
   
    public function store(Request $request) {
        $request->validate( [
            'titre' => 'required',
            'auteur' => 'required',
            'date' => 'required|date',
            'edition' => 'required',
        ] );

        Livre::create( $request->all() );

        return redirect()->route( 'aflivre' )
            ->with( 'success', 'Livre ajouté avec succès.' );
    }

    /**
     * Affiche le formulaire d’édition d’un livre.
     */
    public function edit($id)
    {
        $livre = Livre::findOrFail($id);
        return view('livres.edit', compact('livre'));
    }

    /**
     * Met à jour un livre existant.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titre'   => 'required|string|max:255',
            'auteur'  => 'required|string|max:255',
            'date'    => 'required|date',
            'edition' => 'required|string|max:255',
        ]);

        $livre = Livre::findOrFail($id);
        $livre->update($validated);

        return redirect()
            ->route('aflivre')
            ->with('success', 'Livre modifié avec succès.');
    }

    /**
     * Supprime un livre.
     */
    public function destroy($id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return redirect()
            ->route('aflivre')
            ->with('success', 'Livre supprimé avec succès.');
    }
    
//voir les details de chaque livre
    public function show($id)
{
    $livre = Livre::findOrFail($id); 
    return view('livres.show', compact('livre'));
}
}


