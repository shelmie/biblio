<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LivreController extends Controller
{
    public function aflivre()
    {
        $livres = Livre::latest()->paginate(10);
        return view('livres.livres', compact('livres'));
    }

    public function formlivre()
    {
        return view('livres.form');
    }

    /**
     * STORE : Enregistrer un nouveau livre
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre'            => 'required|string|max:255',
            'auteur'           => 'required|string|max:255',
            'date' => 'nullable|date',
            'edition'          => 'nullable|string|max:255',
            'description'      => 'required|string',
            'isbn'             => 'required|string|max:20|unique:livres,isbn',

            // fichiers obligatoires pour CREATE
            'document'         => 'required|file|mimes:pdf,odt,txt,doc,docx,ppt,pptx|max:10240',
            'image'            => 'required|file|image|mimes:jpeg,jpg,png,gif,svg|max:10240',
        ]);

        $data = $validatedData;

        /**
         * Upload DOCUMENT
         */
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $name = uniqid().'_'.$file->getClientOriginalName();
            $data['document'] = $file->storeAs('documents', $name, 'public');
        }

        /**
         * Upload IMAGE
         */
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = uniqid().'_'.$file->getClientOriginalName();
            $data['image'] = $file->storeAs('images', $name, 'public');
        }

        Livre::create($data);

        return redirect()->route('aflivre')->with('success', 'Livre ajouté avec succès.');
    }


    /**
     * Edit : Charger la vue d’édition
     */
    public function edit($id)
    {
        $livre = Livre::findOrFail($id);
        return view('livres.edit', compact('livre'));
    }


    /**
     * UPDATE : Modifier un livre existant
     */
    public function update(Request $request, $id)
    {
        $livre = Livre::findOrFail($id);

        $validatedData = $request->validate([
            'titre'            => 'required|string|max:255',
            'auteur'           => 'required|string|max:255',
            'date' => 'nullable|date',
            'edition'          => 'nullable|string|max:255',
            'description'      => 'required|string',
            'isbn'             => [
                'required',
                'string',
                'max:20',
                Rule::unique('livres', 'isbn')->ignore($livre->id),
            ],

            // fichiers facultatifs pour UPDATE
            'document'         => 'sometimes|nullable|file|mimes:pdf,odt,txt,doc,docx,ppt,pptx|max:10240',
            'image'            => 'sometimes|nullable|file|image|mimes:jpeg,jpg,png,gif,svg|max:10240',
        ]);

        $data = $validatedData;

        /**
         * Remplacer DOCUMENT si soumis
         */
        if ($request->hasFile('document')) {
            if ($livre->document) {
                Storage::disk('public')->delete($livre->document);
            }

            $file = $request->file('document');
            $name = uniqid().'_'.$file->getClientOriginalName();
            $data['document'] = $file->storeAs('documents', $name, 'public');
        } else {
            unset($data['document']);
        }

        /**
         * Remplacer IMAGE si soumis
         */
        if ($request->hasFile('image')) {
            if ($livre->image) {
                Storage::disk('public')->delete($livre->image);
            }

            $file = $request->file('image');
            $name = uniqid().'_'.$file->getClientOriginalName();
            $data['image'] = $file->storeAs('images', $name, 'public');
        } else {
            unset($data['image']);
        }

        $livre->update($data);

        return redirect()->route('aflivre')->with('success', 'Livre modifié avec succès.');
    }


    /**
     * DESTROY : Supprimer un livre + ses fichiers
     */
    public function destroy($id)
    {
        $livre = Livre::findOrFail($id);

        if ($livre->document) {
            Storage::disk('public')->delete($livre->document);
        }

        if ($livre->image) {
            Storage::disk('public')->delete($livre->image);
        }

        $livre->delete();

        return redirect()->route('aflivre')->with('success', 'Livre supprimé avec succès.');
    }


    /** 
     * SHOW : afficher les détails
     */
    public function show($id)
    {
        $livre = Livre::findOrFail($id);
        return view('livres.show', compact('livre'));
    }
}