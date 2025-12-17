@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Petición</h1>
        <form action="{{ route('admin.petitions.update', $petition->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control"
                       name="title"
                       value="{{ old('title', $petition->title) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control"
                          name="description"
                          rows="4"
                          required>{{ old('description', $petition->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Destinatario</label>
                <input type="text" class="form-control"
                       name="addressee"
                       value="{{ old('addressee', $petition->addressee) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Firmantes</label>
                <input type="number" class="form-control"
                       name="signatories"
                       value="{{ old('signatories', $petition->signatories) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Estado</label>
                <select class="form-select" name="status" required>
                    <option value="pending" {{ $petition->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="accepted" {{ $petition->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <select class="form-select" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $petition->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $petition->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Añadir nuevas imágenes</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar Petición
            </button>

            <a href="{{ route('admin.petitions.show') }}" class="btn btn-secondary">
                Volver al listado
            </a>
        </form>

        <hr class="my-4">

        <h5>Imágenes actuales</h5>
        <div class="d-flex flex-wrap gap-3">
            @foreach($petition->files as $file)
                <div class="position-relative">
                    <img src="{{ asset($file->file_path) }}"
                         width="150"
                         class="img-thumbnail">

                    <form action="{{ route('admin.petitions.delete', $file->id) }}"
                          method="POST"
                          class="position-absolute top-0 end-0"
                          onsubmit="return confirm('¿Eliminar esta imagen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">&times;</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection


