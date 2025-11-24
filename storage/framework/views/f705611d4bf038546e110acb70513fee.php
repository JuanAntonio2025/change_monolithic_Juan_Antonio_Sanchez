

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/searchStyles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <script src="https://unpkg.com/lucide@latest"></script>
    <div class="hero text-center">
        <div class="container container-lg">
            <h1 class="hero-title mb-4">Descubre tu próxima causa</h1>
            <p class="lead text-muted mb-5">Explora millones de peticiones y encuentra las que te interesan</p>

            <!--<div class="search-bar-container d-flex">
                <div class="input-group">
                    <div class="input-group-text bg-white border-end-0">
                        <span data-lucide="search" style="width: 20px; height: 20px; color: #6c757d;"></span>
                    </div>
                    <input type="text" class="form-control form-control-lg search-input border-start-0" placeholder="Buscar peticiones">
                </div>
                <button class="btn btn-lg search-button" type="button"><a href="list.html">Buscar</a></button>
            </div>-->
        </div>
    </div>

    <div class="container container-lg">
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
    <!--Borrar sección categorías-->
    <!--<div class="container container-lg my-5">
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
    </div>-->

    <section class="cause-support-section">
        <div class="container">
            <h2 class="fw-bold mb-4 text-center text-md-start">Apoya causas que te importan</h2>
            <p class="text-muted mb-4 text-center text-md-start">Encuentra peticiones que te conmuevan y alza tu voz para lograr el cambio.</p>

            <!--<div class="d-flex flex-wrap mb-4 justify-content-center justify-content-md-start">
                <span class="filter-chip active">Sanidad</span>
                <span class="filter-chip">Animales</span>
                <span class="filter-chip">Medio Ambiente</span>
                <span class="filter-chip">Educación</span>
                <span class="filter-chip">Justicia Económica</span>
            </div>-->

            <?php $__currentLoopData = $petitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row g-4" id="peticion">
                <div class="col-sm-6 col-lg-3">
                    <div class="petition-card">
                        <div class="petition-image-container">
                            <img src="<?php echo e(asset('assets/images/ArnnsibjtqWOsuJ-800x450-noPad.webp')); ?>" class="petition-image" alt="Salud Mental">
                        </div>
                        <div class="petition-details">
                            <span class="petition-category"><?php echo e($petition->category->name); ?></span>
                            <h3 class="petition-title"><?php echo e($petition->title); ?></h3>
                            <p class="petition-signatures"><?php echo e($petition->signatories); ?> firmas</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        lucide.createIcons();

        peticion = document.getElementById('peticion');
        peticion.addEventListener('click', function() {
            window.location.href = "<?php echo e(route('petitions.show', $petition->id)); ?>";
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/petitions/index.blade.php ENDPATH**/ ?>