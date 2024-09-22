@extends('layouts.app')

@section('template_title')
    {{ __('Admin Dashboard') }}
@endsection


@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <!-- Section commune pour tous les rôles -->
        <div>
            <h2>Informations Générales</h2>
            <h1>{{ Auth::user()->role->name }}</h1>

            <!-- Insérer ici des informations accessibles à tous -->
        </div>

        <!-- Section Admin -->
        @if(Auth::user()->role->label === 'admin')
            <div>
                <h2>Section admin</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Manage Users') }}</div>
                            <div class="card-body">
                                <a href="{{ route('users.index') }}" class="btn btn-primary">{{ __('View Users') }}</a>
                                <a href="{{ route('users.create') }}" class="btn btn-success">{{ __('Create New User') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Manage Animals') }}</div>
                            <div class="card-body">
                                <a href="{{ route('animals.index') }}" class="btn btn-primary">{{ __('View Animals') }}</a>
                                <a href="{{ route('animals.create') }}" class="btn btn-success">{{ __('Create New Animal') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Manage Habitats') }}</div>
                            <div class="card-body">
                                <a href="{{ route('habitats.index') }}" class="btn btn-primary">{{ __('View Habitats') }}</a>
                                <a href="{{ route('habitats.create') }}" class="btn btn-success">{{ __('Create New Habitat') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Manage Images') }}</div>
                            <div class="card-body">
                                <a href="{{ route('images.index') }}" class="btn btn-primary">{{ __('Voir les images') }}</a>
                                <a href="{{ route('images.create') }}" class="btn btn-success">{{ __('Créer une nouvelle image') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Manage Races') }}</div>
                            <div class="card-body">
                                <a href="{{ route('races.index') }}" class="btn btn-primary">{{ __('View Races') }}</a>
                                <a href="{{ route('races.create') }}" class="btn btn-success">{{ __('Create New Races') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Manage Services') }}</div>
                            <div class="card-body">
                                <a href="{{ route('services.index') }}" class="btn btn-primary">{{ __('View Services') }}</a>
                                <a href="{{ route('services.create') }}" class="btn btn-success">{{ __('Create New Service') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Veterinary Reports') }}</div>
                            <div class="card-body">
                                <a href="{{ route('visites.index') }}" class="btn btn-primary">{{ __('View Reports') }}</a>
                                <form method="GET" action="{{ route('visites.index') }}" class="mt-3">
                                    <div class="form-group">
                                        <label for="animal">{{ __('Filter by Animal') }}</label>
                                        <select id="animal" name="animal_id" class="form-control">
                                            <option value="">{{ __('Select Animal') }}</option>
                                            @foreach($animals as $animal)
                                                <option value="{{ $animal->id }}">{{ $animal->prenom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="date">{{ __('Filter by Date') }}</label>
                                        <input type="date" id="date" name="date" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-secondary mt-3">{{ __('Apply Filters') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Section Vétérinaire -->
        @if($user->role->label === 'veterinaire')
            <div>
                <h2>Veterinarian Section</h2>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Veterinary Reports') }}</div>
                            <div class="card-body">
                                <a href="{{ route('visites.create') }}" class="btn btn-success">{{ __('Add New Report') }}</a>
                                <a href="{{ route('visites.index') }}" class="btn btn-primary">{{ __('View All Reports') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Manage Habitat Reviews') }}</div>
                            <div class="card-body">
                                <a href="{{ route('habitats.index') }}" class="btn btn-primary">{{ __('View Habitats') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">{{ __('Animal Consumption') }}</div>
                            <div class="card-body">
                                <a href="{{ route('consommations.index') }}" class="btn btn-primary">{{ __('Voir les consommations') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Section Employé -->
        @if($user->role->label === 'employe')
            <div>
                <h2>Employé Section</h2>
                <!-- Ajouter ici les éléments spécifiques à l'employé -->
                <p>Consommations que vous avez enregistrées :</p>
                <ul>
                    @foreach($consommations as $consommation)
                        <li>{{ $consommation->date }} - {{ $consommation->animal->prenom }} - {{ $consommation->nourriture }}: {{ $consommation->quantite }}g</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Animal Consumption') }}</div>
                    <div class="card-body">
                        <a href="{{ route('consommations.create') }}" class="btn btn-primary">{{ __('Créer une consommation') }}</a>
                        <a href="{{ route('consommations.index') }}" class="btn btn-primary">{{ __('View Animal Consumption') }}</a>
                    </div>
                    </div>
                    </div>
        @endif
    </div>
@endsection
