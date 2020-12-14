@extends('layouts.app')

@section('titre')
    Créer un match
@endsection

@section('content')

    <div class="container">
        @if (!session()->has('success'))
            <ul>
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="input">Nom du Match</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Rentrez le nom du match">
                        @error('match')
                            <div class="invalid-feedback">
                                {{ $errors->first('match') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="input">Pays</label>
                        <input type="text" class="form-control @error('pays') is-invalid @enderror" name="pays"
                            placeholder="Rentrez le nom pays">
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
                                <option value="{{ $equipe->id }}">{{ $equipe->name }}</option>
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
                                <option value="{{ $key }}" {{ $match->cote == $value ? 'selected' : '' }}>{{ $value }}
                                </option>
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
                            placeholder="Rentrez la duree du match">
                        @error('duree')
                            <div class="invalid-feedback">
                                {{ $errors->first('duree') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input @error('image')
                                 is-invalid @enderror" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choisir une image</label>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary">Ajouter le match</button>
                </form>
            </ul>
        @endif
    </div>
@endsection
