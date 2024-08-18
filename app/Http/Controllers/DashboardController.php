<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Visite;
use App\Models\Habitat;
use App\Models\Consommation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Récupération des données pour les vétérinaires, les administrateurs et les employés
        $animals = Animal::all();
        $visites = null;
        $habitats = null;
        $consommations = null;

        // Administrateur
        if ($user->role->label === 'admin') {
            $habitats = Habitat::all();
            $visites = Visite::all();
            $consommations = Consommation::all();
        }

        // Vétérinaire
        if ($user->role->label === 'veterinaire') {
            $visites = Visite::where('veterinaire_id', $user->id)->get();
            $habitats = Habitat::all();
            $consommations = Consommation::all();
        }

        // Employé
        if ($user->role->label === 'employe') {
            $consommations = Consommation::where('employe_id', $user->id)->get();
            $habitats = Habitat::all();
        }

        // On passe les données à la vue
        return view('dashboard.index', compact('user', 'animals', 'visites', 'habitats', 'consommations'));
    }
}
