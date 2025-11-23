@extends('layouts.public')

@section('content')
    <!--Aqui va la vista de lista de peticiones -->
    <!--@foreach($peticiones as $petition)-->

    <main class="container py-4">
        <div class="d-none d-lg-block mb-4">
            <div class="row">
                <div class="col-lg-9">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control border-start-0 py-2" placeholder="Buscar peticiones" aria-label="Buscar peticiones">
                            <button class="btn btn-yellow" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="d-lg-none mb-3">
            <div class="d-flex flex-wrap">
                <button class="btn btn-filter-mobile" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters" aria-controls="offcanvasFilters">
                    Todos los filtros
                </button>
                <div class="dropdown">
                    <button class="btn btn-filter-mobile dropdown-toggle" type="button" id="dropdownTopic" data-bs-toggle="dropdown" aria-expanded="false">
                        Temas
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownTopic">
                        <li><a class="dropdown-item" href="#">Todos los temas</a></li>
                        <li><a class="dropdown-item" href="#">Política y Gobierno</a></li>
                        <li><a class="dropdown-item" href="#">Educación</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-filter-mobile dropdown-toggle" type="button" id="dropdownSort" data-bs-toggle="dropdown" aria-expanded="false">
                        Top
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownSort">
                        <li><a class="dropdown-item" href="#">Más recientes</a></li>
                        <li><a class="dropdown-item" href="#">Más firmadas</a></li>
                    </ul>
                </div>
                <div class="dropdown ms-auto">
                    <button class="btn btn-filter-mobile dropdown-toggle" type="button" id="dropdownCountry" data-bs-toggle="dropdown" aria-expanded="false">
                        Comunidad
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownCountry">
                        <li><a class="dropdown-item" href="#">Todas las peticiones</a></li>
                        <li><a class="dropdown-item" href="#">Mi país</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="sidebar">
                    <div class="filter-section">
                        <h4 class="filter-title">Ubicación</h4>
                        <input type="text" class="form-control" placeholder="Toda la comunidad">
                    </div>

                    <div class="filter-section">
                        <h4 class="filter-title">Estado</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="petitionStatus" id="statusAll" checked>
                            <label class="form-check-label" for="statusAll">Todas las peticiones</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="petitionStatus" id="statusVictories">
                            <label class="form-check-label" for="statusVictories">Solo victorias</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="petitionStatus" id="statusPopular">
                            <label class="form-check-label" for="statusPopular">Populares</label>
                        </div>
                    </div>

                    <div class="filter-section">
                        <h4 class="filter-title">Temas</h4>
                        <div class="d-flex flex-wrap">
                            <a href="#" class="filter-chip-sidebar active">Política y Gobierno</a>
                            <a href="#" class="filter-chip-sidebar">Educación</a>
                            <a href="#" class="filter-chip-sidebar">Justicia Social</a>
                            <a href="#" class="filter-chip-sidebar">Juventud</a>
                            <a href="#" class="filter-chip-sidebar">Derechos Laborales</a>
                            <a href="#" class="filter-chip-sidebar">Institucional</a>
                            <a href="#" class="filter-chip-sidebar">Bienestar de Familias y Niños</a>
                            <a href="#" class="filter-chip-sidebar">Justicia Económica</a>
                            <a href="#" class="filter-chip-sidebar">Derechos de la Mujer</a>
                            <a href="#" class="filter-chip-sidebar">Gobierno Nacional</a>
                            <a href="#" class="filter-chip-sidebar">Negocios y Economía</a>
                            <a href="#" class="filter-chip-sidebar">Conservación y Derechos Animales</a>
                            <a href="#" class="filter-chip-sidebar">Comunidades y Barrios</a>
                            <a href="#" class="filter-chip-sidebar">Derechos del Consumidor</a>
                            <a href="#" class="filter-chip-sidebar">Conservación y Derechos de los Animales</a>
                            <a href="#" class="filter-chip-sidebar">Corrupción</a>
                            <a href="#" class="filter-chip-sidebar">Bienestar de los Animales</a>
                            <a href="#" class="filter-chip-sidebar">Ciencia y Tecnología</a>
                            <a href="#" class="filter-chip-sidebar">Medio Ambiente</a>
                            <a href="#" class="filter-chip-sidebar">Derechos de los Niños</a>
                            <a href="#" class="filter-chip-sidebar">Discapacidad</a>
                            <a href="#" class="filter-chip-sidebar">Deportes</a>
                            <a href="#" class="filter-chip-sidebar">Gobierno Autonómico y Regional</a>
                            <a href="#" class="filter-chip-sidebar">Derechos de los Mayores</a>
                            <a href="#" class="filter-chip-sidebar">Acceso a Atención Médica</a>
                            <a href="#" class="filter-chip-sidebar">Derechos de los Ciudadanos</a>
                            <a href="#" class="filter-chip-sidebar">Transporte y Servicios Públicos</a>
                            <a href="#" class="filter-chip-sidebar">Derechos de las Víctimas de Violencia</a>
                            <a href="#" class="filter-chip-sidebar">Prevención de Delitos</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <h3 class="fw-bold fs-5 mb-3 d-none d-lg-block">109.811 resultados</h3>
                <div class="d-none d-lg-flex justify-content-end mb-3">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button" id="dropdownSortDesktop" data-bs-toggle="dropdown" aria-expanded="false">
                            Ordenar por: Actividad reciente
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownSortDesktop">
                            <li><a class="dropdown-item" href="#">Actividad reciente</a></li>
                            <li><a class="dropdown-item" href="#">Más firmadas</a></li>
                            <li><a class="dropdown-item" href="#">Victoria más reciente</a></li>
                        </ul>
                    </div>
                </div>

                <div class="petitions-list">
                    <div class="petition-item">
                        <div class="petition-item-details">
                            <a href="sign.html" class="petition-item-title d-block">Soy víctima de violencia machista. Pido mejorar urgentemente las pulseras de protección</a>
                            <p class="petition-metadata">
                                <span class="badge bg-secondary">VIOGEN</span> · Creada el 1 de noviembre de 2024
                            </p>
                            <p class="petition-signatures">31.817 firmas</p>
                        </div>
                        <img src="images/XvzyTUYFsYcnqzV-800x450-noPad.webp" alt="Imagen de la petición 1" class="petition-item-image">
                    </div>

                    <div class="petition-item">
                        <div class="petition-item-details">
                            <a href="#" class="petition-item-title d-block">El asesino de mi hijo tenía 17 años. Pido revisar YA la ley del menor para casos graves</a>
                            <p class="petition-metadata">
                                <span class="badge bg-secondary">JUSTICIA</span> · Creada el 24 de octubre de 2024
                            </p>
                            <p class="petition-signatures">58.526 firmas</p>
                        </div>
                        <img src="images/XZehjjclUZeHmQa-800x450-noPad.webp" alt="Imagen de la petición 2" class="petition-item-image">
                    </div>

                    <div class="petition-item">
                        <div class="petition-item-details">
                            <a href="#" class="petition-item-title d-block">Me han echado de clase por llevar Hiyab. ¡Libertad religiosa YA en instituto IES Sagasta!</a>
                            <p class="petition-metadata">
                                <span class="badge bg-secondary">EDUCACIÓN</span> · Creada el 8 de julio de 2024
                            </p>
                            <p class="petition-signatures">11.474 firmas</p>
                        </div>
                        <img src="images/ArnnsibjtqWOsuJ-800x450-noPad.webp" alt="Imagen de la petición 3" class="petition-item-image">
                    </div>

                    <div class="petition-item">
                        <div class="petition-item-details">
                            <a href="#" class="petition-item-title d-block">Mi hija se suicidó con 15 años. El bullying NO es cosa de niñ@s > ¡LEY ACOSO ESCOLAR YA!</a>
                            <p class="petition-metadata">
                                <span class="badge bg-secondary">SALUD</span> · Creada el 15 de septiembre de 2020
                            </p>
                            <p class="petition-signatures">260.566 firmas</p>
                        </div>
                        <img src="images/JACarMOCmNQsrUQ-800x450-noPad.webp" alt="Imagen de la petición 4" class="petition-item-image">
                    </div>
                </div>

                <nav aria-label="Navegación de peticiones" class="mt-4">
                    <ul class="pagination justify-content-center pagination-custom">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Anterior">
                                <span aria-hidden="true">&larr;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">13727</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Siguiente">
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasFilters" aria-labelledby="offcanvasFiltersLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasFiltersLabel">Filtros</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
        </div>
        <div class="offcanvas-body">
            <div class="filter-section">
                <h4 class="filter-title">Ubicación</h4>
                <input type="text" class="form-control" placeholder="Toda la comunidad">
            </div>

            <div class="filter-section">
                <h4 class="filter-title">Estado</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="petitionStatusMobile" id="statusAllMobile" checked>
                    <label class="form-check-label" for="statusAllMobile">Todas las peticiones</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="petitionStatusMobile" id="statusVictoriesMobile">
                    <label class="form-check-label" for="statusVictoriesMobile">Solo victorias</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="petitionStatusMobile" id="statusPopularMobile">
                    <label class="form-check-label" for="statusPopularMobile">Populares</label>
                </div>
            </div>

            <div class="filter-section">
                <h4 class="filter-title">Temas</h4>
                <div class="d-flex flex-wrap">
                    <a href="#" class="filter-chip-sidebar active">Política y Gobierno</a>
                    <a href="#" class="filter-chip-sidebar">Educación</a>
                    <a href="#" class="filter-chip-sidebar">Justicia Social</a>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-yellow w-100">Aplicar Filtros</button>
            </div>
        </div>
    </div>
@endsection
