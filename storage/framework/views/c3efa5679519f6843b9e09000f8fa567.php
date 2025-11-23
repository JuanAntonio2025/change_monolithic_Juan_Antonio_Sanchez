<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/searchStyles.css')); ?>">
    <div class="hero text-center">
        <div class="container container-lg">
            <h1 class="hero-title mb-4">Descubre tu próxima causa</h1>
            <p class="lead text-muted mb-5">Explora millones de peticiones y encuentra las que te interesan</p>

            <div class="search-bar-container d-flex">
                <div class="input-group">
                    <div class="input-group-text bg-white border-end-0">
                        <span data-lucide="search" style="width: 20px; height: 20px; color: #6c757d;"></span>
                    </div>
                    <input type="text" class="form-control form-control-lg search-input border-start-0" placeholder="Buscar peticiones">
                </div>
                <button class="btn btn-lg search-button" type="button"><a href="list">Buscar</a></button>
            </div>
        </div>
    </div>

    <div class="container container-lg my-5">
        <h2 class="h4 fw-bold mb-4">Explorar</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="explore-card">
                    <div class="icon">
                        <span data-lucide="map-pin" style="width: 32px; height: 32px;"></span>
                    </div>
                    <p class="mb-0 fw-semibold">Cerca de ti</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="explore-card">
                    <div class="icon">
                        <span data-lucide="line-chart" style="width: 32px; height: 32px;"></span>
                    </div>
                    <p class="mb-0 fw-semibold">Populares</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="explore-card">
                    <div class="icon">
                        <span data-lucide="trophy" style="width: 32px; height: 32px;"></span>
                    </div>
                    <p class="mb-0 fw-semibold">Victorias</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-lg my-5">
        <h2 class="h4 fw-bold mb-4">Temas</h2>
        <div class="d-flex flex-wrap gap-2">
            <a href="#" class="topic-button">Políticas Públicas</a>
            <a href="#" class="topic-button">Política y Gobierno</a>
            <a href="#" class="topic-button">Educación</a>
            <a href="#" class="topic-button">Bienestar y Salud</a>
            <a href="#" class="topic-button">Gobierno Local</a>
            <a href="#" class="topic-button">Justicia Penal</a>
            <a href="#" class="topic-button">Bienestar de Familias y Niños</a>
            <a href="#" class="topic-button">Justicia Económica</a>
            <a href="#" class="topic-button">Medioambiente</a>
            <a href="#" class="topic-button">Gobierno Nacional</a>
            <a href="#" class="topic-button">Negocios y Economía</a>
            <a href="#" class="topic-button">Entretenimiento y Medios</a>
            <a href="#" class="topic-button">Derechos de los Animales</a>
            <a href="#" class="topic-button">Conservación y Derechos de los Animales</a>
            <a href="#" class="topic-button">Corrupción</a>
            <a href="#" class="topic-button">Bienestar de los Animales</a>
            <a href="#" class="topic-button">Cuestiones Estudiantiles</a>
            <a href="#" class="topic-button">Salud Pública</a>
            <a href="#" class="topic-button">Derechos de los Niños</a>
            <a href="#" class="topic-button">Discapacidad</a>
            <a href="#" class="topic-button">Deportes</a>
            <a href="#" class="topic-button">Tecnología</a>
            <a href="#" class="topic-button">Gobierno Regional</a>
            <a href="#" class="topic-button">Derechos de las Mujeres</a>
            <a href="#" class="topic-button">Acceso a Atención Médica</a>
            <a href="#" class="topic-button">Derechos de los Pacientes</a>
            <a href="#" class="topic-button">Medio Ambiente</a>
            <a href="#" class="topic-button">Debido Proceso</a>
            <a href="#" class="topic-button">Elecciones y Derechos de los Votantes</a>
            <a href="#" class="topic-button">Prevención de Delitos</a>
        </div>
    </div>

    <div class="container-fluid container-lg">
        <hr class="my-5">
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\change_monolotic_Juan_Antonio_Sanchez\resources\views/pages/search.blade.php ENDPATH**/ ?>