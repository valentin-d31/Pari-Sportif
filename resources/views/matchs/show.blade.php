@extends('layouts.app')
@section('titre')
    Voir un match
@endsection

@section('content')
    <div class="container">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">Match</strong>
                <h5 class="mb-0">{{ $match->name }}</h5>
                <div class="mb-1 text-muted">{{ $match->created_at->format('d/m/Y') }}</div>
                <p class="mb-auto">{{ $match->pays }}</p>
                <p class="mb-auto">{{ /* convertTime($match->duree) */ $match->duree }} mn</p>
                <strong class="mb-auto">Cote à {{ $match->getCote()[$match->cote] }}</strong>
                <div class="container my-4" style="display: inline">
                    <a href="#"><button class="btn btn-primary pl-2">Parier sur {{ $match->pays }} </button></a>
                    <a href="#"><button class="btn btn-info">Parier sur la 2eme équipe (temporaire) </button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
