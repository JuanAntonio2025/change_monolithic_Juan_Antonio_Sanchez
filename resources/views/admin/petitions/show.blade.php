@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Listado de Peticiones</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Título</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Autor</th>
                <th>Firmas</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($petitions as $petition)
                <tr>
                    <td>{{ $petition->title }}</td>
                    <td>{{ $petition->category->name }}</td>
                    <td>{{ $petition->description }}</td>
                    <td>{{ $petition->user->name }}</td>
                    <td>{{ $petition->signatories }}</td>
                    <td>{{ $petition->status }}</td>
                    <td>{{ $petition->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.petitions.edit', $petition->id) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('admin.petitions.delete', $petition->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta petición?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

