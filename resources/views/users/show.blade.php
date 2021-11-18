@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <h3>{{$user->name}}</h3>
            <h4 style="margin: 20px 0;">Publicaciones</h4>
            @forelse($user->articulos as $articulo)
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">
                    <h5 class="card-title">{{ $articulo->titulo}}</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">{{ $articulo->usuario->name }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">{{ date_format(date_create($articulo->fecha), 'd/m/Y H:i') }}</h6>
                    <p class="card-text">{{ $articulo->descripcion }}</p>
                    <a href="{{ route('articulo.show', $articulo->id) }}" class="card-link">Ver mas...</a>
                </div>
            </div>
            @empty
                <h5 class="text-muted">Este usuario no ha publicado articulos...</h5>
            @endforelse                                                                                                                                                                             
        </div>
    </div>
</div>

@endsection