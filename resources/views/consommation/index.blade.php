@extends('layouts.app')

@section('template_title')
    Consommations
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Consommations') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('consommations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Animal Id</th>
									<th >Date</th>
									<th >Heure</th>
									<th >Nourriture</th>
									<th >Quantite</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consommations as $consommation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $consommation->animal->prenom }}</td>
                                            <td>{{ $consommation->animal->race->name }}</td>
                                            <td >{{ $consommation->date }}</td>
                                            <td >{{ $consommation->heure }}</td>
                                            <td >{{ $consommation->nourriture }}</td>
                                            <td >{{ $consommation->quantite }}</td>

                                            <td>
                                                <form action="{{ route('consommations.destroy', $consommation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('consommations.show', $consommation->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('consommations.edit', $consommation->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $consommations->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
