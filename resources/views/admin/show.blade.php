@extends('layouts.pannel')

@section('content')
    <ul>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="{{ route('admin.index') }}">Accueil Administration</a>
            </nav>
        </div>
        <hr>
    </ul>
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
    @endif
@endsection
