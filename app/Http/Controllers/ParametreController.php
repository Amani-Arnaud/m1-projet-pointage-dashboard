<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametre;

class ParametreController extends Controller
{
    //

    public function index()
    {
        $param = Parametre::first();
        return view('parametres.index', compact('param'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nom_entreprise' => '',
            'heure_arrivee' => 'required',
            'heure_depart' => 'required',
            'latitude_entreprise' => 'required',
            'longitude_entreprise' => 'required',
            'rayon' => 'required',
            'marge_arrivee' => 'required'
        ]);

        Parametre::updateOrCreate(
            ['id_parametre' => 1],
            [
                'nom_entreprise' => $request->nom_entreprise,
                'heure_arrivee' => $request->heure_arrivee,
                'heure_depart' => $request->heure_depart,
                'latitude_entreprise' => $request->latitude_entreprise,
                'longitude_entreprise' => $request->longitude_entreprise,
                'rayon' => $request->rayon,
                'marge_arrivee' => $request->marge_arrivee
            ]
        );
        return redirect()->route('parametres.index')->with('success', 'Paramètres mis à jour.');
    }
}
