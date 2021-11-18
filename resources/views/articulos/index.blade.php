@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                - {{ $error }}<br>
                @endforeach
            </div>
            @endif

            <div class="collapse" id="collapseExample">
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-body">
                        <form action="{{ route('articulo.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="te" class="form-label">Titulo</label>
                                <input type="text" id="te" class="form-control" name="titulo">
                            </div>
                            <div class="mb-3">
                                <label for="tex" class="form-label">Descripcion</label>
                                <textarea id="tex" class="form-control" rows="3" name="descripcion"></textarea>
                            </div>
                            <input type="submit" value="Publicar" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>

            <div style="display: flex; flex-direction: row; justify-content:space-between; align-items: center; padding: 10px 0;">
                <h4>Publicaciones</h4>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Crear
                </button>
            </div>
            @foreach($data as $articulo)
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
            @endforeach
        </div>
    </div>
</div>

<script>
    var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
    var collapseList = collapseElementList.map(function(collapseEl) {
        return new bootstrap.Collapse(collapseEl)
    })
</script>

@endsection