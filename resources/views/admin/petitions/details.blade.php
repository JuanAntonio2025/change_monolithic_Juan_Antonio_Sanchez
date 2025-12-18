@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Detalles de la Petición</h1>
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                Información General
            </div>
            <div class="card-body">
                <p><strong>Título:</strong> {{ $petition->title }}</p>
                <p><strong>Categoría:</strong> {{ $petition->category->name }}</p>
                <p><strong>Autor:</strong> {{ $petition->user->name }}</p>
                <p><strong>Dirigido a:</strong> {{ $petition->addressee }}</p>
                <p><strong>Firmas:</strong> {{ $petition->signatories }}</p>
                <p><strong>Estado:</strong> <span class="badge @if($petition->status == 'accepted') bg-success @else bg-warning @endif">{{ $petition->status }}</span></p>
                <p><strong>Fecha de Creación:</strong> {{ $petition->created_at->format('d/m/Y H:i') }}</p>

                <hr>

                <h4>Descripción</h4>
                <div class="alert alert-light border">
                    {!! nl2br(e($petition->description)) !!}
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                Imágenes Asociadas
            </div>
            <div class="card-body">
                @if($petition->files->isNotEmpty())
                    <div class="row">
                        @foreach($petition->files as $file)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img src="{{ asset($file->file_path) }}" class="card-img-top" alt="{{ $file->name }}" style="height: 200px; object-fit: cover;">
                                    <div class="card-footer">
                                        <small class="text-muted">{{ $file->name }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No hay imágenes asociadas a esta petición.</p>
                @endif
            </div>
        </div>
        <a href="{{ route('admin.petitions.edit', $petition->id) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('admin.petitions.show') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>
@endsection
