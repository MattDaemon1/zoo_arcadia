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
                                    @if ($image !== null)
                                        {{ $image->image_data }}
                                    @else
                                        L'image n'a pas été trouvée
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nom Fichier:</strong>
                                    @if ($image !== null)
                                        {{ $image->nom_fichier }}
                                    @else
                                        Le nom n'a pas été trouvé
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Type Mime:</strong>
                                    @if ($image !== null)
                                        {{ $image->type_mime }}
                                    @else
                                        Type mine n'a pas été trouvé
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Taille:</strong>
                                    @if ($image !== null)
                                        {{ $image->taille }}
                                    @else
                                        Taille n'a pas été trouvé
                                    @endif
                                    
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Alt:</strong>
                                    @if ($image !== null)
                                        {{ $image->alt }}
                                    @else
                                        Alt n'a pas été trouvé
                                    @endif
                                    
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Habitat Id:</strong>
                                    @if ($image !== null)
                                        {{ $image->habitat_id }}
                                    @else
                                        Habitat Id n'a pas été trouvé
                                    @endif
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection