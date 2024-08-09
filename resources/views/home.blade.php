@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Bienvenue sur la page d'accueil</h1>
        <p class="lead">Ceci est un simple jumbotron pour mettre en valeur le contenu.</p>
        <hr class="my-4">
        <p>Utilisez les utilitaires de Bootstrap pour faire un design simple mais efficace.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">En savoir plus</a>
    </div>
</div>
@endsection
