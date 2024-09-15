<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Ici, vous pouvez ajouter la logique pour traiter le formulaire
        // Par exemple, envoyer un email ou sauvegarder dans la base de données

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès !');
    }
}
