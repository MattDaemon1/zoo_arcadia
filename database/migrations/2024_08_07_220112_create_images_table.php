<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

$file = new UploadedFile(
    'chemin/vers/l/image.jpg',
    'image.jpg',
    'image/jpeg',
    null,
    true
);

$animal = Animal::find(1); // Remplacez 1 par l'ID de l'animal

$path = Storage::disk('public')->putFile('animals', $file);

$habitat = Habitat::find(1); // Remplacez 1 par l'ID de l'habitat

$path = Storage::disk('public')->putFile('habitats', $file);

$image = new Image([
    'path' => $path,
    'type' => $file->getClientMimeType(),
]);

$animal->images()->save($image);
$habitat->images()->save($image);

