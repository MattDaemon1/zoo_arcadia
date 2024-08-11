<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord pour les employés, vétérinaires, et administrateurs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Tu peux utiliser Auth::user() pour récupérer les informations de l'utilisateur connecté.
        $user = Auth::user();

        return view('dashboard.index', compact('user'));
    }
}
