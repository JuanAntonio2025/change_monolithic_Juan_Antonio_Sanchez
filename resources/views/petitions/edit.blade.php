@extends('layouts.public')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-black text-white">
                        <h3 class="mb-0">Editar Petición</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('petitions.update', $petition->id) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Título --}}
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">
                                    Título de la Petición
                                </label>
                                <input type="text"
                                       class="form-control @error('title') is-invalid @enderror"
                                       id="title"
                                       name="title"
                                       value="{{ old('title', $petition->title) }}"
                                       required>

                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Categoría --}}
                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-bold">
                                    Categoría
                                </label>
                                <select class="form-select @error('category_id') is-invalid @enderror"
                                        id="category_id"
                                        name="category_id"
                                        required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $petition->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Destinatario --}}
                            <div class="mb-3">
                                <label for="addressee" class="form-label fw-bold">
                                    Destinatario (Persona o Entidad)
                                </label>
                                <input type="text"
                                       class="form-control @error('addressee') is-invalid @enderror"
                                       id="addressee"
                                       name="addressee"
                                       value="{{ old('addressee', $petition->addressee) }}"
                                       required>

                                <div class="form-text">
                                    ¿A quién va dirigida esta petición?
                                </div>

                                @error('addressee')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Descripción --}}
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">
                                    Descripción / El Problema
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description"
                                          name="description"
                                          rows="5"
                                          required>{{ old('description', $petition->description) }}</textarea>

                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Imagen --}}
                            <div class="mb-3">
                                <label for="images" class="form-label fw-bold">
                                    Foto para la Petición
                                </label>
                                <input type="file"
                                       class="form-control @error('images.*') is-invalid @enderror"
                                       id="images"
                                       name="images[]"
                                       accept="image/*"
                                       multiple>

                                <div class="form-text">
                                    Puedes añadir nuevas imágenes (no se eliminarán las actuales)
                                </div>

                                @error('images.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Botón --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-yellow fw-bold py-2">
                                    Guardar cambios
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

