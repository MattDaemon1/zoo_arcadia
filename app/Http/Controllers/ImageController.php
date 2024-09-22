<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $images = Image::paginate();

        return view('image.index', compact('images'))
            ->with('i', ($request->input('page', 1) - 1) * $images->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $image = new Image();

        return view('image.create', compact('image'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nom_fichier' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
            'habitat_id' => 'required|exists:habitats,id',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            $newImage = new Image;
            $newImage->image_data = 'images/' . $imageName; // Stocke le chemin relatif
            $newImage->nom_fichier = $request->nom_fichier;
            $newImage->type_mime = $image->getMimeType();
            $newImage->taille = $image->getSize();
            $newImage->alt = $request->alt;
            $newImage->habitat_id = $request->habitat_id;
            $newImage->save();

            return redirect()->back()->with('success', 'Image uploaded successfully');
        }

        return redirect()->back()->with('error', 'Failed to upload image');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $image = Image::find($id);

        return view('image.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $image = Image::find($id);

        return view('image.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageRequest $request, Image $image): RedirectResponse
    {
        $image->update($request->validated());

        return Redirect::route('images.index')
            ->with('success', 'Image updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Image::find($id)->delete();

        return Redirect::route('images.index')
            ->with('success', 'Image deleted successfully');
    }
}
