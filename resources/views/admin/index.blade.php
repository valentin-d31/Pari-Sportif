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
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Cote</th>
                    <th scope="col">Match</th>
                    <th scope="col">Equipe</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Durée</th>
                    <th scope="col">Création</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matchs as $match)
                    <tr>
                        <td>{{ $match->getCote()[$match->cote] }}</td>
                        <td><a href="{{ route('admin.show', $match) }}">{{ $match->name }}</a></td>
                        <td>
                            <a href="https://www.google.fr/maps/search/ {{ $match->equipe->name }}" target="_blank">
                                {{ $match->equipe->name }}
                        </td>
                        </a>
                        <td>{{ $match->pays }}</td>
                        <td>{{ $match->duree }} min</td>
                        <td>{{ $match->created_at->format('d/m/Y') }}</td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $match->image }}" style="width: 65px; height: 65px">
                        </td>
                        <td>
                            <form action=" {{ route('admin.destroy', $match->id) }} " method="post">
                                @csrf
                                @method('DELETE')

                                {{-- Voir le match --}}
                                <a href=" {{ route('admin.show', $match) }} " class="btn btn-success"><i
                                        class="fas fa-eye"></i></a>

                                {{-- Editer le match --}}
                                <a href=" {{ route('admin.edit', $match) }} " class="btn btn-info"><i
                                        class="far fa-edit"></i></a>

                                {{-- Supprimer le match --}}
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <p class="text-center">Il n'y a aucun match en cours</p>
                @endforelse
            </tbody>
        </table>
        <hr>
    </div>
@endsection
