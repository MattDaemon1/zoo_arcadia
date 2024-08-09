<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\HabitatController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AviController;
use App\Http\Controllers\ConsommationController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('images', ImageController::class);
Route::resource('visites', VisiteController::class);
Route::resource('animals', AnimalController::class);
Route::resource('habitats', HabitatController::class);
Route::resource('races', RaceController::class);
Route::resource('services', ServiceController::class);
Route::resource('avis', AviController::class);
Route::resource('consommations', ConsommationController::class);
