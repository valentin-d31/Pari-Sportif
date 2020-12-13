@extends('layouts.index')


@section('content')
    @foreach ($matchs as $match)
        <div class="col-md-6">
            <div
                class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">match</strong>
                    <h5 class="mb-0">{{ $match->name }}</h5>
                    <div class="mb-1 text-muted">{{ $match->created_at->format('d/m/Y') }}</div>
                    <p class="mb-auto">{{ $match->pays }}</p>
                    <p class="mb-auto">{{ $match->duree }} mn</p>
                    <strong class="mb-auto">Cote à {{ $match->cote }}</strong>
                    <a href="{{ route('pari.show', $match->id) }}" class="stretched-link btn btn-info">Voir le match</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                </div>
            </div>
        </div>
    @endforeach
    {{ $matchs->links() }}
@endsection
