@extends('layouts.app')

@section('template_title')
    Images
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Images') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('images.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Image Data</th>
									<th >Nom Fichier</th>
									<th >Type Mime</th>
									<th >Taille</th>
									<th >Alt</th>
									<th >Habitat Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $image)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $image->image_data }}</td>
										<td >{{ $image->nom_fichier }}</td>
										<td >{{ $image->type_mime }}</td>
										<td >{{ $image->taille }}</td>
										<td >{{ $image->alt }}</td>
										<td >{{ $image->habitat_id }}</td>

                                            <td>
                                                <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('images.show', $image->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('images.edit', $image->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $images->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
