<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class FichierController extends Controller
{

public function enregistrer(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cne' => 'required|string|max:255',
            'note_module_1' => 'required|numeric',
            'note_module_2' => 'required|numeric',
            'note_module_3' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Récupérer les données de la requête
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $cne = $request->input('cne');
        $note_module_1 = $request->input('note_module_1');
        $note_module_2 = $request->input('note_module_2');
        $note_module_3 = $request->input('note_module_3');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Format des données à ajouter au fichier
        $donnees = "Nom: $nom, Prenom: $prenom, CNE: $cne, Note1: $note_module_1, Note2: $note_module_2, Note3: $note_module_3, Latitude: $latitude, Longitude: $longitude \n";

        // Ajouter les données au fichier
        Storage::append('master_rsi2020.txt', $donnees);
        $contenu = [];

    if (Storage::exists('master_rsi2020.txt')) {
        $contenuFichier = Storage::get('master_rsi2020.txt');
        $lignes = explode("\n", trim($contenuFichier));

        foreach ($lignes as $ligne) {
            if (!empty($ligne)) {
                list($nom, $prenom, $cne, $note1, $note2, $note3) = sscanf($ligne, "Nom: %[^,], Prenom: %[^,], CNE: %[^,], Note1: %d, Note2: %d, Note3: %d");
                $contenu[] = [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'cne' => $cne,
                    'note_module_1' => $note1,
                    'note_module_2' => $note2,
                    'note_module_3' => $note3,
                ];
            }
        }
    }
        return view('pages.user.listFichier', ['contenu' => $contenu]);
    }

public function afficher()
{
    $contenu = [];

    if (Storage::exists('master_rsi2020.txt')) {
        $contenuFichier = Storage::get('master_rsi2020.txt');
        $lignes = explode("\n", trim($contenuFichier));

        foreach ($lignes as $ligne) {
            if (!empty($ligne)) {
                list($nom, $prenom, $cne, $note1, $note2, $note3) = sscanf($ligne, "Nom: %[^,], Prenom: %[^,], CNE: %[^,], Note1: %d, Note2: %d, Note3: %d");
                $contenu[] = [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'cne' => $cne,
                    'note_module_1' => $note1,
                    'note_module_2' => $note2,
                    'note_module_3' => $note3,
                ];
            }
        }
    } else {
        $contenu = [];
    }

    return view('pages.user.listFichier', ['contenu' => $contenu]);
}

public function insertFichier()
{
    return view('insertFichier');
}

public function modifier(Request $request, $index)
{
    // Lire le contenu du fichier
    $contenuFichier = Storage::get('master_rsi2020.txt');
    $lignes = explode("\n", trim($contenuFichier));

    // Modifier la ligne correspondante
    if (isset($lignes[$index])) {
        $lignes[$index] = "Nom: {$request->nom}, Prenom: {$request->prenom}, CNE: {$request->cne}, Note1: {$request->note_module_1}, Note2: {$request->note_module_2}, Note3: {$request->note_module_3}";
        Storage::put('master_rsi2020.txt', implode("\n", $lignes));
    }

    return redirect()->route('afficher');
}

public function supprimer($index)
{
    // Lire le contenu du fichier
    $contenuFichier = Storage::get('master_rsi2020.txt');
    $lignes = explode("\n", trim($contenuFichier));

    // Supprimer la ligne correspondante
    if (isset($lignes[$index])) {
        unset($lignes[$index]);
        Storage::put('master_rsi2020.txt', implode("\n", $lignes));
    }
    
    return redirect()->route('afficher');
}

public function afficherCarte()
{
    $contenu = [];

    if (Storage::exists('master_rsi2020.txt')) {
        $contenuFichier = Storage::get('master_rsi2020.txt');
        $lignes = explode("\n", trim($contenuFichier));

        foreach ($lignes as $ligne) {
            if (!empty($ligne)) {
                list($nom, $prenom, $cne, $note1, $note2, $note3, $latitude, $longitude) = sscanf($ligne, "Nom: %[^,], Prenom: %[^,], CNE: %[^,], Note1: %d, Note2: %d, Note3: %d, Latitude: %f, Longitude: %f");
                $contenu[] = [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'cne' => $cne,
                    'note_module_1' => $note1,
                    'note_module_2' => $note2,
                    'note_module_3' => $note3,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ];
            }
        }
    }

    return view('projects.geo', ['contenu' => $contenu]);
}

public function showChart()
    {
        // Récupérer les données des étudiants depuis la base de données
        $contenu = [];

    if (Storage::exists('master_rsi2020.txt')) {
        $contenuFichier = Storage::get('master_rsi2020.txt');
        $lignes = explode("\n", trim($contenuFichier));

        foreach ($lignes as $ligne) {
            if (!empty($ligne)) {
                list($nom, $prenom, $cne, $note1, $note2, $note3, $latitude, $longitude) = sscanf($ligne, "Nom: %[^,], Prenom: %[^,], CNE: %[^,], Note1: %d, Note2: %d, Note3: %d, Latitude: %f, Longitude: %f");
                $contenu[] = [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'cne' => $cne,
                    'note_module_1' => $note1,
                    'note_module_2' => $note2,
                    'note_module_3' => $note3,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ];
            }
        }
    }

    return view('projects.chartjs', ['contenu' => $contenu]);
    }

}




