@extends('layouts.app')

@section('titre')
    Editer le match {{ $match->name }}
@endsection

@section('content')
    <div class="container">
        <h3>Editer le profil du match {{ $match->name }}</h3>
        <form action="{{ route('admin.update', $match) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="input">Nom du Match</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="Rentrez le nom du match" value="{{ old('name') ?? $match->name }}">
                @error('match')
                    <div class="invalid-feedback">
                        {{ $errors->first('match') }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="input">Pays</label>
                <input type="text" class="form-control @error('pays') is-invalid @enderror" name="pays"
                    placeholder="Rentrez le nom pays" value="{{ old('pays') ?? $match->pays }}">
                @error('pays')
                    <div class="invalid-feedback">
                        {{ $errors->first('pays') }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="input">Nom de l'Equipe</label>
                <select class="custom-select @error('equipe_id') is-invalid @enderror" name="equipe_id">
                    @foreach ($equipes as $equipe)
                        <option value="{{ $equipe->id }}" {{ $match->equipe_id == $equipe->id ? 'selected' : '' }}>
                            {{ $equipe->name }}
                        </option>
                    @endforeach
                </select>
                @error('equipe_id')
                    <div class="invalid-feedback">
                        {{ $errors->first('equipe_id') }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="input">Cote</label>
                <select class="custom-select @error('cote') is-invalid @enderror" name="cote">
                    @foreach ($match->getCote() as $key => $value)
                        <option value="{{ $key }}" {{ $match->cote == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @error('cote')
                    <div class="invalid-feedback">
                        {{ $errors->first('cote') }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="input">Durée du match</label>
                <input type="text" class="form-control @error('pays') is-invalid @enderror" name="duree"
                    placeholder="Rentrez la duree du match" value="{{ old('duree') ?? $match->duree }}">
                @error('duree')
                    <div class="invalid-feedback">
                        {{ $errors->first('duree') }}
                    </div>
                @enderror
            </div>
            <div class="form" style="display: inline">
                <button type="submit" class="btn btn-primary">Sauvegarder le match</button>
                <a href=" {{ route('admin.show', $match->id) }} " class="btn btn-info">Retour</a>
            </div>
        </form>
    </div>
@endsection
