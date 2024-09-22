@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Nos Services</h1>
    
    @if($services->isEmpty())
        <div class="alert alert-info">
            Aucun service n'est actuellement disponible.
        </div>
    @else
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->nom }}</h5>
                            <p class="card-text">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@section('styles')
<style>
    .card {
        transition: transform 0.3s;
        background-color: #e8f0e3; /* Utilise la couleur "light" de votre thème */
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card-title {
        color: #3a9d6e; /* Utilise la couleur "primary" de votre thème */
    }
</style>
@endsection