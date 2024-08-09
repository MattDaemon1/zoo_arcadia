<?php

namespace App\Http\Controllers;

use App\Models\Avi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AviRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AviController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $avis = Avi::paginate();

        return view('avi.index', compact('avis'))
            ->with('i', ($request->input('page', 1) - 1) * $avis->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $avi = new Avi();

        return view('avi.create', compact('avi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AviRequest $request): RedirectResponse
    {
        Avi::create($request->validated());

        return Redirect::route('avis.index')
            ->with('success', 'Avi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $avi = Avi::find($id);

        return view('avi.show', compact('avi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $avi = Avi::find($id);

        return view('avi.edit', compact('avi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AviRequest $request, Avi $avi): RedirectResponse
    {
        $avi->update($request->validated());

        return Redirect::route('avis.index')
            ->with('success', 'Avi updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Avi::find($id)->delete();

        return Redirect::route('avis.index')
            ->with('success', 'Avi deleted successfully');
    }
}
