@extends('layouts.app')

@section('titre')
    Afficher le match {{ $match->name }}
@endsection

@section('content')
    <div class="container">
        @if (!session()->has('success'))
            <h1>{{ $match->name }}</h1>
            <hr>
            <p><strong>Equipe :</strong> {{ $match->equipe->name }}</p>
            <p><strong>Pays :</strong> {{ $match->pays }}</p>
            <p><strong>Cote :</strong> {{ $match->getCote()[$match->cote] }}</p>
            <p><strong>Durée :</strong> {{ $match->duree }} mn</p>
            <p><strong>Créer le :</strong> {{ $match->created_at->format('d/m/Y') }}</p>
            <P>
            <img src="{{asset('storage') . '/' . $match->image}}"
            style="width: 65px; height: 65px">
            </P>
            <hr>
            <a href="{{ route('admin.edit', $match) }}" class="btn btn-secondary my-3">Editer</a>
            <form action="{{ route('admin.destroy', $match) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
    </div>
    @endif
@endsection
