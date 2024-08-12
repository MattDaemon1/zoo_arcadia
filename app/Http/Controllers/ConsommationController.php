<?php

namespace App\Http\Controllers;

use App\Models\Consommation;
use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ConsommationRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ConsommationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $consommations = Consommation::paginate();

        return view('consommation.index', compact('consommations'))
            ->with('i', ($request->input('page', 1) - 1) * $consommations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $consommation = new Consommation();
        $animals = Animal::with('race')->get();

        return view('consommation.create', compact('consommation', 'animals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsommationRequest $request): RedirectResponse
    {
        Consommation::create($request->validated());

        return Redirect::route('consommation.index')
            ->with('success', 'Consommation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $consommation = Consommation::findOrFail($id);

        return view('consommation.show', compact('consommation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $consommation = Consommation::find($id);
        $animals = Animal::with('race')->get();

        return view('consommations.edit', compact('consommation', 'animals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsommationRequest $request, Consommation $consommation): RedirectResponse
    {
        $consommation->update($request->validated());

        return Redirect::route('consommation.index')
            ->with('success', 'Consommation updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $consommation = Consommation::findOrFail($id);
        $consommation->delete();

        return Redirect::route('consommation.index')
            ->with('success', 'Consommation deleted successfully');
    }
}
