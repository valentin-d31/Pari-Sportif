@extends('layouts.app')

@section('titre')
    Afficher les matchs
@endsection

@section('content')
    <div class="container">
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="{{ route('admin.create') }}">Créer un Match</a>
            </nav>
        </div>
        <h1>Afficher les matchs</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cote</th>
                    <th scope="col">Match</th>
                    <th scope="col">Equipe</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Durée</th>
                    <th scope="col">Création</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matchs as $match)
                    <tr>
                        <td>{{ $match->getCote()[$match->cote] }}</td>
                        <td><a href="{{ route('admin.show', $match) }}">{{ $match->name }}</a></td>
                        <td>{{ $match->equipe->name }}</td>
                        <td>{{ $match->pays }}</td>
                        <td>{{ $match->duree }} min</td>
                        <td>{{ $match->created_at->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <p class="text-center">Il n'y a aucun match en cours</p>
                @endforelse
            </tbody>
        </table>
        <hr>
    </div>
@endsection
