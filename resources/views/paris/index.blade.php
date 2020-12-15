{{-- @extends('layouts.index') --}}
@extends('home')

@section('titre')
    Afficher les paris en cours
@endsection

@section('content')
    <div class="container">
        @if (session()->has('echec'))
            <div class="alert alert-danger">
                {{ session()->get('echec') }}
            </div>
        @endif
        <div class="row mb-2">
            <div class="row">
                @forelse ($matchs as $match)
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">Pari</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">{{ $match->name }}</a>
                                </h3>
                                <div class="mb-1 text-muted"> {{ $match->created_at->format('d/m/Y') }} </div>
                                <div class="mb-1 text-muted"> {{ $match->getCote()[$match->cote] }} </div>
                                <p class="mb-auto">{{ $match->pays }}</p>
                                <p class="mb-auto">{{ $match->duree }} mn</p>
                                <p class="card-text mb-auto">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, ad veritatis!
                                </p>
                                <a href="{{ route('pari.show', $match->id) }}" class="btn btn-info my-3">Voir le match</a>
                            </div>
                            <img src=" {{ asset('storage') . '/' . $match->image }} "
                                class="card-img-right flex-auto d-none d-md-block" width="275" alt="Card image cap">
                        </div>
                    </div>
                @empty
                </div>
                <div class="container">
                    <p class="text-center">Aucun match en cours</p>
                </div>
            @endforelse
        </div>
        {{ $matchs->links() }}
    </div>
@endsection
