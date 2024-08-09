<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Vous pouvez passer des données à la vue si nécessaire
        // $data = ['key' => 'value'];

        // Retourne la vue 'home' (vous devrez créer cette vue dans le dossier resources/views)
        return view('home'); // Vous pouvez aussi passer des données comme second argument : return view('home', $data);
    }
}
