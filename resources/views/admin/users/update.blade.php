@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Usuario</h1>
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nueva Contraseña (opcional)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select name="role" class="form-select">
                    <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Usuario</option>
                    <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>
            <button class="btn btn-primary">Actualizar Usuario</button>
            <a href="{{ route('admin.users.show') }}" class="btn btn-secondary">Volver al Listado</a>
        </form>
    </div>
@endsection

