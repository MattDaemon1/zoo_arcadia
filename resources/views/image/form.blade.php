<div class="row padding-1 p-1">
    <div class="col-md-12">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group mb-2 mb20">
                <label for="image" class="form-label">{{ __('Image') }}</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Image">
                {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="nom_fichier" class="form-label">{{ __('Nom Fichier') }}</label>
                <input type="text" name="nom_fichier" class="form-control @error('nom_fichier') is-invalid @enderror" value="{{ old('nom_fichier', $image?->nom_fichier) }}" id="nom_fichier" placeholder="Nom Fichier">
                {!! $errors->first('nom_fichier', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="alt" class="form-label">{{ __('Alt') }}</label>
                <input type="text" name="alt" class="form-control @error('alt') is-invalid @enderror" value="{{ old('alt', $image?->alt) }}" id="alt" placeholder="Alt">
                {!! $errors->first('alt', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="habitat_id" class="form-label">{{ __('Habitat Id') }}</label>
                <input type="text" name="habitat_id" class="form-control @error('habitat_id') is-invalid @enderror" value="{{ old('habitat_id', $image?->habitat_id) }}" id="habitat_id" placeholder="Habitat Id">
                {!! $errors->first('habitat_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>

            <div class="col-md-12 mt20 mt-2">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
</div>