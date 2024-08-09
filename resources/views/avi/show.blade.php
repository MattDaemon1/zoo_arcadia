@extends('layouts.app')

@section('template_title')
    {{ $avi->name ?? __('Show') . " " . __('Avi') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Avi</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('avis.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Pseudo:</strong>
                                    {{ $avi->pseudo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Commentaire:</strong>
                                    {{ $avi->commentaire }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Isvisible:</strong>
                                    {{ $avi->isVisible }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
