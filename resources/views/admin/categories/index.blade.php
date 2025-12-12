@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Gestión de Categorías</h1>
        <div class="row g-4">

            <!-- Panel Ver Categorías -->
            <div class="col-md-4">
                <a href="{{ route('admin.categories.show') }}" class="text-decoration-none">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-list-ul display-4 mb-3"></i>
                            <h5 class="card-title">Ver Categorías</h5>
                            <p class="card-text">Listado completo de categorías.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Panel Crear Categoría -->
            <div class="col-md-4">
                <a href="{{ route('admin.categories.create') }}" class="text-decoration-none">
                    <div class="card text-white bg-success h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-plus-circle display-4 mb-3"></i>
                            <h5 class="card-title">Crear Categoría</h5>
                            <p class="card-text">Añadir una nueva categoría al sistema.</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
