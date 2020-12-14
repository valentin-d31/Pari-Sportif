@extends('layouts.app')

@section('titre')
    Afficher le match {{ $match->name }}
@endsection

@section('content')
    <div class="container">
        @if (!session()->has('success'))
            <h1>{{ $match->name }}</h1>
            <hr>
            <p><strong>Equipe:</strong> {{ $match->equipe->name }}</p>
            <p><strong>Pays:</strong> {{ $match->pays }}</p>
            <p><strong>Cote:</strong> {{ $match->cote }}</p>
            <p><strong>Durée:</strong> {{ $match->duree }}</p>
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
