@extends('layouts.index')


@section('content')
  @foreach($paris as $pari)
      <div class="col-md-6">
          <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">Pari</strong>
              <h5 class="mb-0">{{$pari->name}}</h5>
              <div class="mb-1 text-muted">{{$pari->created_at->format('d/m/Y')}}</div>
              <p class="mb-auto">{{$pari->subtitle}}</p>
              <strong class="mb-auto">Cote à : {{$pari->formatCoast()}}</strong>
              <a href="{{route('pari.show', $pari->slug)}}"
              class="stretched-link btn btn-info">Description Match</a>
              </div>
              <div class="col-auto d-none d-lg-block">
              </div>
          </div>
          </div>
    @endforeach
    {{$paris->links()}}
@endsection