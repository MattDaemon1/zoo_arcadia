<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RaceRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $races = Race::paginate();

        return view('race.index', compact('races'))
            ->with('i', ($request->input('page', 1) - 1) * $races->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $race = new Race();

        return view('race.create', compact('race'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RaceRequest $request): RedirectResponse
    {
        Race::create($request->validated());

        return Redirect::route('races.index')
            ->with('success', 'Race created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $race = Race::find($id);

        return view('race.show', compact('race'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $race = Race::find($id);

        return view('race.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RaceRequest $request, Race $race): RedirectResponse
    {
        $race->update($request->validated());

        return Redirect::route('races.index')
            ->with('success', 'Race updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Race::find($id)->delete();

        return Redirect::route('races.index')
            ->with('success', 'Race deleted successfully');
    }
}
