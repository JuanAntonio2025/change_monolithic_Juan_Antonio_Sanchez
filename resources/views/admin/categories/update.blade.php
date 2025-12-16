@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Categoría</h1>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la Categoría</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
            <a href="{{ route('admin.categories.show') }}" class="btn btn-secondary">Volver al Listado</a>
        </form>
    </div>
@endsection

