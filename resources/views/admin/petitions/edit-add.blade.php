@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Crear Nueva Petición</h1>
        <form action="{{ route('admin.petitions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="addressee" class="form-label">Destinatario</label>
                <input type="text" class="form-control" id="addressee" name="addressee" value="{{ old('addressee') }}" required>
            </div>

            <div class="mb-3">
                <label for="signatories" class="form-label">Firmantes</label>
                <input type="number" class="form-control" id="signatories" name="signatories" value="{{ old('signatories', 0) }}" min="0">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="pending" selected>Pending</option>
                    <option value="accepted">Accepted</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Imágenes de la petición</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple>
                <small class="text-muted">Puedes subir varias imágenes. Se almacenarán en <code>public/fotos</code></small>
            </div>

            <button type="submit" class="btn btn-success">Crear Petición</button>
        </form>
    </div>
@endsection


