@extends('layouts.index')
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
                <p class="mb-auto">{{ $match->duree }}</p>
                <strong class="mb-auto">Cote à {{ $match->cote }}</strong>
                <a href="#"><button class="btn btn-primary my-3">Parier</button></a>
            </div>
        </div>
    </div>
@endsection
