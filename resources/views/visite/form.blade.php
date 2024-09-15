<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="animal_id" class="form-label">{{ __('Animal') }}</label>
            <select name="animal_id" class="form-control @error('animal_id') is-invalid @enderror" id="animal_id">
                <option value="">{{ __('Select Animal') }}</option>
                @foreach($animals as $animal)
                    <option value="{{ $animal->id }}" {{ old('animal_id', $visite?->animal_id) == $animal->id ? 'selected' : '' }}>
                        {{ $animal->prenom }} - {{ $animal->race->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('animal_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date_visite" class="form-label">{{ __('Date Visite') }}</label>
            <input type="text" name="date_visite" class="form-control @error('date_visite') is-invalid @enderror" value="{{ old('date_visite', $visite?->date_visite) }}" id="date_visite" placeholder="Date Visite">
            {!! $errors->first('date_visite', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="remarques" class="form-label">{{ __('Remarques') }}</label>
            <input type="text" name="remarques" class="form-control @error('remarques') is-invalid @enderror" value="{{ old('remarques', $visite?->remarques) }}" id="remarques" placeholder="Remarques">
            {!! $errors->first('remarques', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>