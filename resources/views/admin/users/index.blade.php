@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Usuarios</h1>
        <div class="row g-4">
            <div class="col-md-4">
                <a href="{{ route('admin.users.show') }}" class="text-decoration-none">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-people display-4 mb-3"></i>
                            <h5 class="card-title">Ver Usuarios</h5>
                            <p class="card-text">Listado completo de usuarios.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.users.create') }}" class="text-decoration-none">
                    <div class="card text-white bg-success h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-plus-circle display-4 mb-3"></i>
                            <h5 class="card-title">Crear Usuario</h5>
                            <p class="card-text">Añadir un nuevo usuario al sistema.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection


