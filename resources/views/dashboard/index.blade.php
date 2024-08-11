@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tableau de bord</div>

                <div class="card-body">
                    Bienvenue, {{ $user->name }}! <br>

                    @if($user->role->name === 'admin')
                        <p>Vous avez les privilèges d'administrateur.</p>
                        <!-- Contenu spécifique à l'admin -->
                    @elseif($user->role->name === 'veterinaire')
                        <p>Vous êtes un vétérinaire.</p>
                        <!-- Contenu spécifique au vétérinaire -->
                    @elseif($user->role->name === 'employe')
                        <p>Vous êtes un employé.</p>
                        <!-- Contenu spécifique à l'employé -->
                    @endif

                    <p>Ceci est votre tableau de bord personnalisé.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
