@extends('layouts.app')

@section('titre')
    Voir le profil de {{ $user->name }}
@endsection

@section('content')
    <h1 class="text-center">{{ $user->name }}</h1>
    <form action=" {{ route('user.delete', $user->id) }} " method="post" class="d-flex justify-content-center my-2">
        <a href=" {{ route('user.edit', $user->id) }} " class="btn btn-secondary">Editer</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">E-mail</th>
                <th scope="col">Age</th>
                <th scope="col">Adresse</th>
                <th scope="col">Tel.M</th>
                <th scope="col">Tel.F</th>
                <th scope="col">Sport préf</th>
                <th scope="col">Montant</th>
                <th scope="col">Date de création</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->email }}</td>
                <td>{{ $user->age }} ans</td>
                <td>{{ $user->adresse }}</td>
                <td>{{ $user->tel_mobile }}</td>
                <td>{{ $user->tel_fixe }}</td>
                <td>{{ $user->sport_pref }}</td>
                <td>{{ $user->montant_max }} €</td>
                <td>{{ $user->created_at->format('d/m/Y') }}</td>
            </tr>
        </tbody>
    </table>
@endsection
