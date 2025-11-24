@extends('layouts.public')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/signStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <main class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="pet-title">{{$petition->title}}</h1>
                <div class="petition-hero-image-container mb-4">
                    <img src="{{asset('assets/images/ArnnsibjtqWOsuJ-800x450-noPad.webp')}}" class="petition-hero-image" alt="Imagen principal de la petición">
                </div>
                <div class="mt-4">
                    <h2 class="content-section-title">El problema</h2>
                    <p>{{$petition->description}}</p>
                </div>
                <div class="creator-info">
                    <img src="https://placehold.co/40x40/585858/fff?text=M" alt="Avatar del creador">
                    <div>
                        <div class="creator-name">{{$petition->user->name}}</div>
                        <div class="creator-desc">Creador de la Petición</div>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="comment-header-title">Opiniones de firmantes</h3>
                    </div>

                    <div class="comment-item">
                        <div class="comment-meta fw-bold">Juan M.</div>
                        <p class="comment-text mb-0">"Es vital reducir la edad. ¡El diagnóstico temprano salva vidas!"</p>
                    </div>

                    <div class="comment-item">
                        <div class="comment-meta fw-bold">María G.</div>
                        <p class="comment-text mb-0">"Mi tía tuvo un diagnóstico tardío. Por favor, que esto cambie."</p>
                    </div>

                    <div class="comment-item">
                        <div class="comment-meta fw-bold">Pedro R.</div>
                        <p class="comment-text mb-0">"He firmado y compartido. Mucho ánimo a Carmen."</p>
                    </div>

                    <div class="text-center mt-3">
                        <button class="btn btn-outline-dark me-2 fw-bold">Ver todos los comentarios</button>
                    </div>
                </div>
                <div class="contrib-section-detail text-center">
                    <h2 class="fw-bold fs-5">Apoya el cambio<br>Hazte Socio</h2>

                    <div class="avatar-group-custom justify-content-center">
                        <img src="https://placehold.co/35x35/000000/fff?text=1" alt="Avatar 1">
                        <img src="https://placehold.co/35x35/f0ad4e/fff?text=2" alt="Avatar 2">
                        <img src="https://placehold.co/35x35/5cb85c/fff?text=3" alt="Avatar 3">
                        <img src="https://placehold.co/35x35/d9534f/fff?text=4" alt="Avatar 4">
                        <img src="https://placehold.co/35x35/5bc0de/fff?text=5" alt="Avatar 5">
                        <span class="ms-3 fw-bold align-self-center">+1.234</span>
                    </div>

                    <p class="small text-muted mb-3">Change.org no depende de la política ni de personas influyentes
                        y es una plataforma gratuita en la que personas de todo el mundo pueden lograr cambios. Cada
                        día se consiguen victorias reales en causas que te interesan, gracias a que estamos financiados
                        al 100 % por personas como tú.</p>
                    <button class="btn btn-yellow">Apoya a Change.org</button>
                    <p class="small text-muted mt-2 fw-bold">¿Nos apoyarás para proteger el poder de las personas para marcar la diferencia?</p>
                </div>

            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="sidebar-sticky">
                    <div class="signature-box">
                        <h2 class="signature-count text-center">{{$petition->signatories}}</h2>
                        <div class="signature-goal text-center">Firmas Verificadas</div>
                        <hr>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control rounded-pill py-2" placeholder="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control rounded-pill py-2" placeholder="Apellidos" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control rounded-pill py-2" placeholder="Correo electrónico" required>
                            </div>
                            <div class="mb-3">
                                <label><input type="radio"/> Quiero saber si esta petición gana y cómo puedo ayudar a otras peticiones ciudadanas.</label>
                            </div>
                            <div class="mb-3">
                                <label><input type="radio"/> No quiero saber como avanza esta petición ni otras peticiones importantes.</label>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-yellow rounded-2 py-2 fw-bold">
                                    Firmar la petición
                                </button>
                            </div>
                            <div class="form-check small text-muted mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="updatesCheck" checked>
                                <label class="form-check-label" for="updatesCheck">
                                    No mostrar publicamente mi firma y mi comentario en esta petición
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <div class="mobile-sign-fixed d-lg-none">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="signature-count small">50.171</div>
                <div class="signature-goal small" style="line-height: 1;">Firmas</div>
            </div>
            <button class="btn btn-yellow fw-bold py-2 px-4" data-bs-toggle="modal" data-bs-target="#signatureModal">
                Firmar
            </button>
        </div>
    </div>

    <div class="modal fade" id="signatureModal" tabindex="-1" aria-labelledby="signatureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signatureModalLabel">Firma esta petición</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="signature-count text-center">50.171</h2>
                    <div class="signature-goal text-center">Firmas Verificadas</div>
                    <hr>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-pill py-2" placeholder="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-pill py-2" placeholder="Apellidos" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control rounded-pill py-2" placeholder="Correo electrónico" required>
                        </div>
                        <div class="mb-3">
                            <label><input type="radio"/> Quiero saber si esta petición gana y cómo puedo ayudar a otras peticiones ciudadanas.</label>
                        </div>
                        <div class="mb-3">
                            <label><input type="radio"/> No quiero saber como avanza esta petición ni otras peticiones importantes.</label>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-yellow rounded-2 py-2 fw-bold">
                                Firmar la petición
                            </button>
                        </div>
                        <div class="form-check small text-muted mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="updatesCheck" checked>
                            <label class="form-check-label" for="updatesCheck">
                                No mostrar publicamente mi firma y mi comentario en esta petición
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
