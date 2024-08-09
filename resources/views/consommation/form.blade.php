<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="animal_id" class="form-label">{{ __('Animal Id') }}</label>
            <input type="text" name="animal_id" class="form-control @error('animal_id') is-invalid @enderror" value="{{ old('animal_id', $consommation?->animal_id) }}" id="animal_id" placeholder="Animal Id">
            {!! $errors->first('animal_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Date') }}</label>
            <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $consommation?->date) }}" id="date" placeholder="Date">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="heure" class="form-label">{{ __('Heure') }}</label>
            <input type="text" name="heure" class="form-control @error('heure') is-invalid @enderror" value="{{ old('heure', $consommation?->heure) }}" id="heure" placeholder="Heure">
            {!! $errors->first('heure', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nourriture" class="form-label">{{ __('Nourriture') }}</label>
            <input type="text" name="nourriture" class="form-control @error('nourriture') is-invalid @enderror" value="{{ old('nourriture', $consommation?->nourriture) }}" id="nourriture" placeholder="Nourriture">
            {!! $errors->first('nourriture', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="quantite" class="form-label">{{ __('Quantite') }}</label>
            <input type="text" name="quantite" class="form-control @error('quantite') is-invalid @enderror" value="{{ old('quantite', $consommation?->quantite) }}" id="quantite" placeholder="Quantite">
            {!! $errors->first('quantite', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>