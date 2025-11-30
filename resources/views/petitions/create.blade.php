@extends('layouts.public')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Crear una Nueva Petición</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('petitions.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Título de la Petición</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-bold">Categoría</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                    <option value="" disabled selected>Selecciona una categoría</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="addressee" class="form-label fw-bold">Destinatario (Persona o Entidad)</label>
                                <input type="text" class="form-control @error('addressee') is-invalid @enderror" id="addressee" name="addressee" value="{{ old('addressee') }}" required>
                                <div class="form-text">¿A quién va dirigida esta petición?</div>
                                @error('addressee')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Descripción / El Problema</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--<div class="mb-3">
                                <label for="file" class="form-label fw-bold">Foto para la Petición</label>
                                <input type="file" class="form-control error('file') is-invalid enderror" id="file" name="file" accept="image/*">
                                <div class="form-text">Sube una imagen relevante para tu petición</div>
                                error('file')
                                <div class="invalid-feedback">{$message }</div>
                                enderror
                            </div>-->

                            <div class="d-grid">
                                <button type="submit" class="btn btn-yellow fw-bold py-2">
                                    Publicar Petición
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!--


-->
