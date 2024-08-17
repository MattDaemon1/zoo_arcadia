<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Visite;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $animals = Animal::all(); // Pour le filtre par animal

        return view('dashboard.index', compact('animals'));
    }
}
