@extends('layouts.app')

@section('template_title')
    {{ $image->name ?? __('Show') . " " . __('Image') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Image</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('images.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Image Data:</strong>
                                    {{ $image->image_data }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nom Fichier:</strong>
                                    {{ $image->nom_fichier }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Type Mime:</strong>
                                    {{ $image->type_mime }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Taille:</strong>
                                    {{ $image->taille }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Alt:</strong>
                                    {{ $image->alt }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Habitat Id:</strong>
                                    {{ $image->habitat_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
