<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnimalRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Race;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $animals = Animal::paginate();

        return view('animal.index', compact('animals'))
            ->with('i', ($request->input('page', 1) - 1) * $animals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $races = Race::pluck('name', 'id');
        $animal = new Animal();

        return view('animal.create', compact('races', 'animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'race_id' => 'required|exists:races,id',
        ]);

        Animal::create($validatedData);

        return redirect()->route('animals.index')
            ->with('success', 'Animal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $animal = Animal::find($id);

        return view('animal.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $races = Race::pluck('name', 'id');
        $animal = Animal::findOrFail($id);

        return view('animal.edit', compact('races', 'animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalRequest $request, Animal $animal): RedirectResponse
    {
        $animal->update($request->validated());

        return Redirect::route('animals.index')
            ->with('success', 'Animal updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Animal::find($id)->delete();

        return Redirect::route('animals.index')
            ->with('success', 'Animal deleted successfully');
    }
}
