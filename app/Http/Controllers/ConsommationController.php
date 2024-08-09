<?php

namespace App\Http\Controllers;

use App\Models\Consommation;
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

        return view('consommation.create', compact('consommation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsommationRequest $request): RedirectResponse
    {
        Consommation::create($request->validated());

        return Redirect::route('consommations.index')
            ->with('success', 'Consommation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $consommation = Consommation::find($id);

        return view('consommation.show', compact('consommation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $consommation = Consommation::find($id);

        return view('consommation.edit', compact('consommation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsommationRequest $request, Consommation $consommation): RedirectResponse
    {
        $consommation->update($request->validated());

        return Redirect::route('consommations.index')
            ->with('success', 'Consommation updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Consommation::find($id)->delete();

        return Redirect::route('consommations.index')
            ->with('success', 'Consommation deleted successfully');
    }
}
