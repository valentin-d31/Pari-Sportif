@extends('layouts.pannel')

@section('content')

<ul>
<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" href="{{route('admin.index')}}">Accueil Administration</a>
    </nav>
</div>
<hr>
</ul>
@if (!session()->has('success'))
<ul>
<form action="{{route('admin.store')}}" method="POST">
  @csrf
    <div class="form-group">
        <label for="input">Nom du Match</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
        name="name" placeholder="Rentrez le nom du match">
        @error('match')
          <div class="invalid-feedback">
              {{$errors->first('match')}}
          </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="input">Pays</label>
        <input type="text" class="form-control @error('pays') is-invalid @enderror"
        name="pays" placeholder="Rentrez le nom pays">
        @error('pays')
          <div class="invalid-feedback">
              {{$errors->first('pays')}}
          </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="input">Nom de l'Equipe</label>
        <select class="custom-select @error('equipe_id') is-invalid @enderror"
        name="equipe_id">
          @foreach($equipes as $equipe)
          <option value="{{$equipe->id}}">{{$equipe->name}}</option>
          @endforeach
        </select>
        @error('equipe_id')
          <div class="invalid-feedback">
            {{$errors->first('equipe_id')}}
          </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="input">Cote</label>
        <select class="custom-select @error('cote') is-invalid @enderror"
        name="cote">
        @foreach($match->getCote() as $key => $value)
          <option value="{{$key}}" {{$match->cote == $value ? 'selected' : ''}}>{{$value}}</option>
        @endforeach
        </select>
        @error('cote')
          <div class="invalid-feedback">
              {{$errors->first('cote')}}
          </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="input">Durée du match</label>
        <input type="text" class="form-control @error('pays') is-invalid @enderror"
        name="duree" placeholder="Rentrez la duree du match">
        @error('duree')
          <div class="invalid-feedback">
              {{$errors->first('duree')}}
          </div>
        @enderror
    </div>
    <button type="submit" class= "btn btn-primary">Ajouter le match</button>
  </form>
</ul>
@endif
@endsection