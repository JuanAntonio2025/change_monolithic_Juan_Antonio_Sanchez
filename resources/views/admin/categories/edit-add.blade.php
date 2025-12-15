@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Crear Nueva Categoría</h1>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la Categoría</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required>
            </div>

            <button type="submit" class="btn btn-success">Crear Categoría</button>
        </form>
    </div>
@endsection

