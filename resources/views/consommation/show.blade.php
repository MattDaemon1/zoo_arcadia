@extends('layouts.app')

@section('template_title')
    {{ $consommation->name ?? __('Show') . " " . __('Consommation') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Consommation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('consommations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Animal Id:</strong>
                                    {{ $consommation->animal_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Date:</strong>
                                    {{ $consommation->date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Heure:</strong>
                                    {{ $consommation->heure }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nourriture:</strong>
                                    {{ $consommation->nourriture }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Quantite:</strong>
                                    {{ $consommation->quantite }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
