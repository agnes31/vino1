<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellar;
use Illuminate\Support\Facades\Auth;

class CellarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cellars = Cellar::all()->where('user_id', Auth::user()->id);
        return view('cellars.index', ['cellars' => $cellars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cellars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'name'             => 'required|min:2|max:50',
            'description'      => 'nullable|min:2|max:500'
        ]);

        // Créer le cellier
        Cellar::create([
            'name'              => $request->name,
            'description'       => $request->description,
            'user_id'           => Auth::user()->id
        ]);

        return redirect('/cellars')->withSuccess("Votre cellier a été créé avec succès!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cellar $cellar)
    {
        return view('cellars.show', ['cellar' => $cellar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cellar $cellar)
    {
        return view('cellars.edit', ['cellar' => $cellar]);
    }

    /**
     * les modifications de la table de la bd
     */
    public function update(Request $request, Cellar $cellar)
    {
 
        // Valider les données
         $request->validate([
        'name'             => 'required|min:2|max:50',
        'description'      => 'nullable|min:2|max:500'
                ]);
 
        $cellar->update([
          'name' => $request->name,
          'description' => $request->description
        ]);
        
        return redirect("cellars/" . $cellar->id);
      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cellar $cellar)
    {
        $cellar->delete();
        return redirect('/cellars')->withSuccess("Le cellier a été effacé");
    }
}
