@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar Petición</h1>

        {{-- FORMULARIO PRINCIPAL (ACTUALIZAR PETICIÓN) --}}
        <form action="{{ route('admin.petitions.update', $petition->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Título -->
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       value="{{ old('title', $petition->title) }}"
                       required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control"
                          id="description"
                          name="description"
                          rows="4"
                          required>{{ old('description', $petition->description) }}</textarea>
            </div>

            <!-- Destinatario -->
            <div class="mb-3">
                <label for="addressee" class="form-label">Destinatario</label>
                <input type="text"
                       class="form-control"
                       id="addressee"
                       name="addressee"
                       value="{{ old('addressee', $petition->addressee) }}"
                       required>
            </div>

            <!-- Firmantes -->
            <div class="mb-3">
                <label for="signatories" class="form-label">Firmantes</label>
                <input type="number"
                       class="form-control"
                       id="signatories"
                       name="signatories"
                       value="{{ old('signatories', $petition->signatories) }}"
                       min="0">
            </div>

            <!-- Estado -->
            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-select"
                        id="status"
                        name="status"
                        required>
                    <option value="pending" {{ old('status', $petition->status) == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>
                    <option value="accepted" {{ old('status', $petition->status) == 'accepted' ? 'selected' : '' }}>
                        Accepted
                    </option>
                </select>
            </div>

            <!-- Usuario -->
            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <select class="form-select"
                        id="user_id"
                        name="user_id"
                        required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $petition->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Categoría -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select class="form-select"
                        id="category_id"
                        name="category_id"
                        required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $petition->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Subir nuevas imágenes -->
            <div class="mb-3">
                <label for="images" class="form-label">Añadir nuevas imágenes</label>
                <input type="file"
                       class="form-control"
                       id="images"
                       name="images[]"
                       multiple>
                <small class="text-muted">Se almacenarán en <code>public/fotos</code></small>
            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar Petición
            </button>
        </form>

        <hr class="my-4">

        {{-- IMÁGENES EXISTENTES (FORMULARIOS INDEPENDIENTES) --}}
        <div class="mb-3">
            <label class="form-label">Imágenes actuales</label>
            <div class="d-flex flex-wrap gap-3">
                @foreach($petition->files as $file)
                    <div class="position-relative">
                        <img src="{{ asset($file->file_path) }}"
                             alt="{{ $file->name }}"
                             width="150"
                             class="img-thumbnail">

                        <form action="{{ route('admin.petitions.delete', $file->id) }}"
                              method="POST"
                              class="position-absolute top-0 end-0"
                              onsubmit="return confirm('¿Eliminar esta imagen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                &times;
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

