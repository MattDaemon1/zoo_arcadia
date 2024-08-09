@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Visite
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Visite</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('visites.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('visite.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
