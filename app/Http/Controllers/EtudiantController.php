<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all students
        $etudiants = Etudiant::all();
        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all(); 
        return view('etudiants.create', compact('villes'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:etudiants,email|unique:users,email',
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id',
            'password' => 'required|min:6|max:20', // Validate password
        ]);
    
        // Create the Etudiant
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
            'password' => Hash::make($request->password), 
        ]);
    
        // Create the corresponding User
        \App\Models\User::create([
            'name' => $etudiant->nom, 
            'email' => $etudiant->email, 
            'password' => Hash::make($request->password), 
            'etudiant_id' => $etudiant->id, 
        ]);
    
        // Redirect to show the new Etudiant
        return redirect()->route('etudiants.show', $etudiant->id)->withSuccess('Étudiant créé avec succès !');
    }
    

    public function show(Etudiant $etudiant)
    {
        // Show details of a specific Etudiant
        return view('etudiants.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all(); // Retrieve all cities for the dropdown list
        return view('etudiants.edit', compact('etudiant', 'villes'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        // Validate the request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:etudiants,email,' . $etudiant->id,
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id'
        ]);

        // Update the student
        $etudiant->update($request->all());

        // Redirect to show the updated Etudiant
        return redirect()->route('etudiants.show', $etudiant->id)->withSuccess('Étudiant mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        // Delete the Etudiant
        $etudiant->delete();

        // Redirect to the list of Etudiants
        return redirect()->route('etudiants.index')->withSuccess('Étudiant supprimé avec succès !');
    }

   
}
