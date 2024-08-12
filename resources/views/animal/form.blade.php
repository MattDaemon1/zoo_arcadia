<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="prenom" class="form-label">{{ __('Prenom') }}</label>
            <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom', $animal?->prenom) }}" id="prenom" placeholder="Prenom">
            {!! $errors->first('prenom', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="etat" class="form-label">{{ __('Etat') }}</label>
            <input type="text" name="etat" class="form-control @error('etat') is-invalid @enderror" value="{{ old('etat', $animal?->etat) }}" id="etat" placeholder="Etat">
            {!! $errors->first('etat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
        <label for="race_id" class="form-label">{{ __('Race') }}</label>
        <select name="race_id" class="form-control @error('race_id') is-invalid @enderror" id="race_id">
            <option value="">-- Select Race --</option>
            @foreach($races as $id => $name)
                <option value="{{ $id }}" {{ (old('race_id') ?? $animal->race_id) == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('race_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>