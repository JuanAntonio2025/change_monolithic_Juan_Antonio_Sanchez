@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Crear Nuevo Usuario</h1>

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select name="role" class="form-select">
                    <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>Usuario</option>
                    <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <button class="btn btn-success">Crear Usuario</button>
        </form>
    </div>
@endsection

