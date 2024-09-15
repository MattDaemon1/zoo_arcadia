<?php

namespace App\Http\Controllers;

use App\Models\Avi;
use App\Models\Habitat;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $habitats = Habitat::with(['animals.race'])->get();
        $services = Service::all();
        $avis = Avi::latest()->take(4)->get();

        return view('home', compact('habitats', 'services', 'avis'));
    }
}
