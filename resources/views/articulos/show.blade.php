@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card" style="margin-bottom: 20px;">
                @if($articulo->user_id == $user->id)
                <form action="{{ route('articulo.update') }}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="text" name="id" value="{{ $articulo->id }}" hidden>
                    <div class="card-header">
                        <input type="text" class="form-control" name="titulo" value="{{ $articulo->titulo }}">
                    </div>
                    <div class="card-body">
                        <textarea id="tex" class="form-control" rows="5" name="descripcion">{{ $articulo->descripcion }}</textarea>
                        <input type="submit" value="Editar" class="btn btn-success" style="margin-top: 20px;">
                    </div>
                </form>
                @else
                <div class="card-header">
                    <h5 class="card-title">{{ $articulo->titulo}}</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">{{ $articulo->usuario->name }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">{{ date_format(date_create($articulo->fecha), 'd/m/Y H:i') }}</h6>
                    <p class="card-text">{{ $articulo->descripcion }}</p>
                </div>
                @endif
            </div>

            <h4>Comentarios</h4>

            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                - {{ $error }}<br>
                @endforeach
            </div>
            @endif

            <form action="{{ route('comentario.store') }}" method="POST">
                @csrf
                <input type="text" name="articulo" value="{{ $articulo->id}} " hidden>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Comenta algo..." aria-describedby="button-addon2" name="descripcion">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Comentar</button>
                </div>
            </form>

            @forelse($articulo->comentarios as $comentario)
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">{{ $comentario->usuario->name }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">{{ date_format(date_create($comentario->fecha), 'd/m/Y H:i') }}</h6>
                    <p class="card-text">{{ $comentario->descripcion }}</p>

                    @if($comentario->user_id == $user->id)
                    <form action="{{ route('comentario.destroy', $comentario->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este comentario?')">
                    </form>
                    @endif
                </div>
            </div>
            @empty
            <h6 class="mb-2 text-muted">Aun no hay comentarios</h6>
            @endforelse
        </div>
    </div>
</div>

@endsection