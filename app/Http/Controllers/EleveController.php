<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Affiche la liste de tous les élèves.
     */
    public function index()
    {
        $eleves = Eleve::orderBy('nom', 'asc')
            ->orderBy('postnom', 'asc')
            ->orderBy('prenom', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Liste des élèves récupérée avec succès.',
            'data' => $eleves,
        ]);
    }

    /**
     * Enregistre un nouvel élève.
     */
    public function store(Request $request)
    {
        //Validation des données entrantes
        $validatedData = $request->validate([
            'matricule' => 'required|string|max:255|unique:eleves,matricule',
            'photo' => 'nullable|string|max:255',
            'nom' => 'required|string|max:100',
            'postnom' => 'required|string|max:100',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string|in:Masculin,Féminin',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'nom_pere' => 'nullable|string|max:255',
            'nom_mere' => 'nullable|string|max:255',
            'telephone_parent' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'actif' => 'sometimes|boolean',
        ]);
        // Création d'un nouvel élève
        $eleve = Eleve::create($validatedData);

        //Retourne une réponse JSON avec les informations de l'élève créé
        return response()->json([
            'success' => true,
            'message' => 'Élève créé avec succès.',
            'data' => $eleve,
        ], 201);
    }

    /**
     * Affiche les informations d'un élève précis.
     */
    public function show(string $id)
    {
        $eleve = Eleve::find($id, ['*']);

        if (!$eleve) {
            return response()->json([
                'success' => false,
                'message' => 'Élève non trouvé.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Informations de l\'élève récupérées avec succès.',
            'data' => $eleve,
        ]);
    }

    /**
     * Met à jour les informations d'un élève.
     */
    public function update(Request $request, string $id)
    {
        //Recherche de l'élève à mettre à jour
        $eleve = Eleve::find($id, ['*']);

        // Si l'élève n'existe pas, retourne une réponse d'erreur
        if (!$eleve) {
            return response()->json([
                'success' => false,
                'message' => 'Eleve non trouvé.',
            ], 404);
        }

        //Validation des données entrantes
        $validatedData = $request->validate([
            'matricule' => 'required|string|max:255|unique:eleves,matricule,' . $eleve->id,
            'photo' => 'nullable|string|max:255',
            'nom' => 'sometimes|string|max:100',
            'postnom' => 'sometimes|string|max:100',
            'prenom' => 'sometimes|string|max:255',
            'sexe' => 'sometimes|string|in:Masculin,Féminin',
            'date_naissance' => 'sometimes|date',
            'lieu_naissance' => 'nullable|string|max:255',
            'nom_pere' => 'nullable|string|max:255',
            'nom_mere' => 'nullable|string|max:255',
            'telephone_parent' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'actif' => 'sometimes|boolean',
        ]);

        // Mise à jour des informations de l'élève
        $eleve->update($validatedData);

        //Retourne une réponse JSON avec les informations de l'élève mis à jour
        return response()->json([
            'success' => true,
            'message' => 'Élève mis à jour avec succès.',
            'data' => $eleve,
        ], 200);
    }

    /**
     * Supprime un élève.
     */
    public function destroy(string $id)
    {
        //Recherche de l'élève à supprimer
        $eleve = Eleve::find($id, ['*']);

        if (!$eleve) {
            return response()->json([
                'success' => false,
                'message' => 'Élève non trouvé.',
            ], 404);
        }

        $eleve->delete();

        return response()->json([
            'success' => true,
            'message' => 'Élève supprimé avec succès.',
        ], 200);
    }


}
