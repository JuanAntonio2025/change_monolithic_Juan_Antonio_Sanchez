@extends('layouts.public')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4 fw-bold">Mis Firmas</h1>
        @if($petitions->isEmpty())
            <div class="alert alert-info">
                Aún no has firmado ninguna petición.
            </div>
        @else
            <div class="row g-4" id="peticion">
                @foreach($petitions as $petition)
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('petitions.show', $petition->id) }}" class="text-decoration-none text-dark">

                            <div class="petition-card">

                                <div class="petition-image-container">
                                    @php
                                        $firstFile = $petition->files->first();
                                        $imagePath = $firstFile ? $firstFile->file_path : null;
                                    @endphp

                                    <img src="{{ asset($imagePath) }}"
                                         class="petition-image"
                                         alt="{{ $petition->title }}">
                                </div>

                                <div class="petition-details">
                                <span class="petition-category">
                                    {{ $petition->category->name ?? 'Sin categoría' }}
                                </span>

                                    <h3 class="petition-title">
                                        {{ $petition->title }}
                                    </h3>

                                    <p class="petition-signatures">
                                        {{ $petition->signatories }} firmas
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
