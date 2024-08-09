@extends('layouts.app')

@section('template_title')
    {{ $animal->name ?? __('Show') . " " . __('Animal') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Animal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('animals.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Prenom:</strong>
                                    {{ $animal->prenom }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Etat:</strong>
                                    {{ $animal->etat }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Race Id:</strong>
                                    {{ $animal->race_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
