<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use PDF; 
class LivreController extends Controller
{
   // alias pour barryvdh/laravel-dompdf

public function exportPdf()
{
    $books = Livre::all();
    $pdf = PDF::loadView('livre.pdf', compact('books'));
    return $pdf->download('livre.pdf');
}
public function create()
{
    return view('livres.create'); // Affiche le formulaire
}
    public function index(Request $request)
    {
        $query = Livre::query();
    
        // Recherche par titre ou auteur
        if ($search = $request->input('search')) {
            $query->where('titre', 'like', "%{$search}%")
                  ->orWhere('auteur', 'like', "%{$search}%");
        }
    
        // Pagination : 5 livres par page
        $livres = $query->orderBy('created_at', 'desc')->paginate(5);
    
        return view('livres.index', compact('livres'));
        
    }
    

    public function store(Request $request) {
        $validated = $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'annee' => 'required|integer',
            'genre' => 'required',
            'resume' => 'nullable'
        ]);
    
        Livre::create($validated);
    
        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès.');
    }
    public function show(Livre $livre) {
        return $livre;
    }

    public function edit(Livre $livre)
{
    return view('livres.edit', compact('livre'));
}


public function update(Request $request, Livre $livre) {
    $validated = $request->validate([
        'titre' => 'nullable',
        'auteur' => 'nullable',
        'annee' => 'nullable|integer',
        'genre' => 'nullable',
        'resume' => 'nullable'
    ]);

    $livre->update($validated);

    return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès.');
}



    public function destroy(Livre $livre) {
        $livre->delete();
        return response()->json(['message' => 'Livre supprimé']);
    }
}

