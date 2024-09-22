<?php

namespace App\Http\Controllers;

use App\Models\Habitat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\HabitatRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HabitatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $habitats = Habitat::paginate();

        return view('habitat.index', compact('habitats'))
            ->with('i', ($request->input('page', 1) - 1) * $habitats->perPage());
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $habitat = new Habitat();

        return view('habitat.create', compact('habitat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitatRequest $request): RedirectResponse
    {
        Habitat::create($request->validated());

        return Redirect::route('habitats.index')
            ->with('success', 'Habitat created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $habitat = Habitat::find($id);

        return view('habitat.show', compact('habitat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $habitat = Habitat::find($id);

        return view('habitat.edit', compact('habitat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitatRequest $request, Habitat $habitat): RedirectResponse
    {
        $habitat->update($request->validated());

        return Redirect::route('habitats.index')
            ->with('success', 'Habitat updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Habitat::find($id)->delete();

        return Redirect::route('habitats.index')
            ->with('success', 'Habitat deleted successfully');
    }
}
