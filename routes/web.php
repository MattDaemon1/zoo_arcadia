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
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Models\User;
use HomeController as GlobalHomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('images', ImageController::class);
    Route::resource('visites', VisiteController::class);
    Route::resource('animals', AnimalController::class);
    Route::resource('/habitats', HabitatController::class);
    Route::resource('races', RaceController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('avis', AviController::class);
    Route::resource('consommations', ConsommationController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});