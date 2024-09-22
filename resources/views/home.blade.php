@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Présentation du Zoo -->
    <section id="presentation" class="mb-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="display-5">Bienvenue au Zoo Arcadia</h2>
                <p class="lead">
                    Le Zoo Arcadia est un endroit unique où la nature et la faune se rejoignent. Situé en Bretagne, près de la forêt de Brocéliande, le zoo est un modèle d'écologie et de préservation des espèces. Nous proposons des habitats naturels pour nos animaux et assurons leur bien-être quotidien grâce à nos vétérinaires et spécialistes.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/zoo-entrance.jpg') }}" class="img-fluid rounded" alt="Entrée du Zoo Arcadia">
            </div>
        </div>
    </section>

    <!-- Habitats et Animaux -->
    <section id="habitats" class="mb-5">
        <h2 class="mb-4">Nos Habitats et Animaux</h2>
        <div class="row">
            @foreach($habitats as $habitat)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/habitats/' . $habitat->image) }}" class="card-img-top" alt="{{ $habitat->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $habitat->nom }}</h5>
                            <p class="card-text">{{ $habitat->description }}</p>
                            <h6>Animaux dans cet habitat :</h6>
                            <ul>
                                @foreach($habitat->animals as $animal)
                                    <li>{{ $animal->prenom }} - {{ $animal->race->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="mb-5">
        <h2 class="mb-4">Nos Services</h2>
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
    </section>

    <!-- Avis des Visiteurs -->
    <section id="avis" class="mb-5">
        <h2 class="mb-4">Avis des Visiteurs</h2>
        <div class="row">
            @foreach($avis as $avi)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $avi->pseudo }}</h5>
                            <p class="card-text">{{ $avi->content }}</p>
                            <small class="text-muted">Posté le {{ $avi->created_at->format('d/m/Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>
@endsection
