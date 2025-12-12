@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Listado de Categorías</h1>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Creada</th>
                <th>Actualizada</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('d/m/Y') }}</td>
                    <td>{{ $category->updated_at->format('d/m/Y') }}</td>
                    <td class="d-flex gap-2">

                        <!-- Editar -->
                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="btn btn-sm btn-primary">
                            Editar
                        </a>

                        <!-- Eliminar -->
                        <form action="{{ route('admin.categories.delete', $category->id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

