<?php

namespace App\Http\Controllers;

use App\Models\Visite;
use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VisiteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class VisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $visites = Visite::paginate();

        return view('visite.index', compact('visites'))
            ->with('i', ($request->input('page', 1) - 1) * $visites->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $visite = new Visite();
        $animals = Animal::with('race')->get();

        return view('visite.create', compact('visite', 'animals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisiteRequest $request): RedirectResponse
    {
        Visite::create($request->validated());

        return Redirect::route('visites.index')
            ->with('success', 'Visite created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $visite = Visite::find($id);

        return view('visite.show', compact('visite'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $visite = Visite::findOrFail($id);
        $animals = Animal::with('race')->get();

        return view('visite.edit', compact('visite', 'animals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisiteRequest $request, Visite $visite): RedirectResponse
    {
        $visite->update($request->validated());

        return Redirect::route('visites.index')
            ->with('success', 'Visite updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Visite::find($id)->delete();

        return Redirect::route('visites.index')
            ->with('success', 'Visite deleted successfully');
    }
}
