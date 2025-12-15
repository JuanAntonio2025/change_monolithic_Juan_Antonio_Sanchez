@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Usuarios</h1>
        <div class="col-md-2 m-3">
            <a href="{{ route('admin.users.create') }}" class="text-decoration-none">
                <div class="card text-white bg-success h-100">
                    <h5 class="card-title text-center p-2">Crear Usuario</h5>
                </div>
            </a>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Role</th>
                <th>Creada</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role == 1 ? 'Administrador' : 'Usuario' }}</td>
                    <td>{{ optional($user->created_at)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>

                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection



