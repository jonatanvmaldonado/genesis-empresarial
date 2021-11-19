@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser" data-bs-whatever="@fat">Crear usuario</button>
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                - {{ $error }}<br>
                @endforeach
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>
                            <a type="button" class="btn btn-sm btn-success" href="/users/{{ $user->id }}">
                                Ver Articulos({{ count($user->articulos )}})
                            </a>
                            <button class="btn btn-sm btn-secondary" onclick="edit({{ $user->toJson() }})">
                                Editar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="user-name" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="user-name" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="user-email" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="user-email" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="user-password" class="col-form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="user-password" name="password" value="{{ old('password') }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Almacenar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('users.update') }}" method="POST" id="editUserForm">
                            @method('PUT')
                            @csrf
                            <input type="text" id="edit-user-id" name="id" hidden>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="edit-user-name" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="edit-user-name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-user-email" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="edit-user-email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-user-password" class="col-form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="edit-user-password" name="password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function edit(user) {
        var myModal = new bootstrap.Modal(document.getElementById('editUser'));
        myModal.show();
        document.getElementById('edit-user-id').value = user.id;
        document.getElementById('edit-user-name').value = user.name;
        document.getElementById('edit-user-email').value = user.email;
    }
</script>

@endsection