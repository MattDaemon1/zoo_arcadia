<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="pseudo" class="form-label">{{ __('Pseudo') }}</label>
            <input type="text" name="pseudo" class="form-control @error('pseudo') is-invalid @enderror" value="{{ old('pseudo', $avi?->pseudo) }}" id="pseudo" placeholder="Pseudo">
            {!! $errors->first('pseudo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="commentaire" class="form-label">{{ __('Commentaire') }}</label>
            <input type="text" name="commentaire" class="form-control @error('commentaire') is-invalid @enderror" value="{{ old('commentaire', $avi?->commentaire) }}" id="commentaire" placeholder="Commentaire">
            {!! $errors->first('commentaire', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_visible" class="form-label">{{ __('Isvisible') }}</label>
            <input type="text" name="isVisible" class="form-control @error('isVisible') is-invalid @enderror" value="{{ old('isVisible', $avi?->isVisible) }}" id="is_visible" placeholder="Isvisible">
            {!! $errors->first('isVisible', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>