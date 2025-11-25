@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change.org - El cambio comienza aquí</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script async src="{{asset('assets/js/*')}}"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-danger" href="/">
            Change.org
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3">
                <li class="nav-item"><a class="nav-link fw-bold" href="#">Mis peticiones</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#">Programa de socios/as</a></li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="petitions/index" class="btn btn-link text-decoration-none text-dark fw-bold me-2">Buscar</a>
                <button class="btn btn-outline-dark me-2 fw-bold"><a class="btn-enlaces" href="create.html">Inicia una petición</a></button>
                <button class="btn fw-bold"><a class="btn-enlaces" href="/login">Entrar</a></button>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer-custom">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3 mb-4">
                <h5 class="footer-heading">Acerca de</h5>
                <a href="#" class="footer-link">Sobre change.org</a>
                <a href="#" class="footer-link">Impacto</a>
                <a href="#" class="footer-link">Equipo</a>
            </div>

            <div class="col-6 col-md-3 mb-4">
                <h5 class="footer-heading">Comunidad</h5>
                <a href="#" class="footer-link">Normas de la Comunidad</a>
            </div>

            <div class="col-6 col-md-3 mb-4">
                <h5 class="footer-heading">Ayuda</h5>
                <a href="#" class="footer-link">Guías</a>
                <a href="#" class="footer-link">Privacidad</a>
                <a href="#" class="footer-link">Derechos</a>
                <a href="#" class="footer-link">Declaración de accesibilidad</a>
                <a href="#" class="footer-link">Política de cookies</a>
                <a href="#" class="footer-link">Gestionar cookies</a>
            </div>

            <div class="col-6 col-md-3 mb-4">
                <h5 class="footer-heading">Redes sociales</h5>
                <a href="#" class="footer-link">Facebook</a>
                <a href="#" class="footer-link">Instagram</a>
                <a href="#" class="footer-link">TikTok</a>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3 border-top mt-3">
            <p class="mb-2 mb-md-0 text-muted">&copy; 2025, Change.org PBC</p>
            <div class="d-flex align-items-center">
                <p class="text-muted me-3 mb-0 d-none d-lg-block" style="font-size: 0.75rem;">Este sitio web está protegido por reCAPTCHA y se aplica la <a href="#" class="text-muted text-decoration-underline">Política de privacidad</a> y los <a href="#" class="text-muted text-decoration-underline">Términos de uso</a> de Google.</p>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                        Español (España)
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownLanguage">
                        <li><a class="dropdown-item" href="#">English (US)</a></li>
                        <li><a class="dropdown-item" href="#">Português (Brasil)</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chips = document.querySelectorAll('.filter-chip');
        chips.forEach(chip => {
            chip.addEventListener('click', function() {
                chips.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>

</body>
</html>

