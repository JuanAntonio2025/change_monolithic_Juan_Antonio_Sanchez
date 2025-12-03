<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/signStyle.css')); ?>">
    <div class="container mt-3">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>

    <main class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="pet-title"><?php echo e($petition->title); ?></h1>
                <div class="petition-hero-image-container mb-4">
                    <?php
                        $firstFile = $petition->files->first();
                        $imagePath = $firstFile ? $firstFile->file_path : null;
                    ?>

                    <img src="<?php echo e(asset($imagePath)); ?>"
                         class="petition-image"
                         alt="<?php echo e($petition->title); ?>">
                </div>
                <div class="mt-4">
                    <p>Destinatario: <?php echo e($petition->addressee); ?></p>
                </div>
                <div class="mt-4">
                    <h2 class="content-section-title">El problema</h2>
                    <p><?php echo e($petition->description); ?></p>
                </div>
                <div class="creator-info">
                    <?php
                        $nombre = $petition->user->name;
                        $letra = ucfirst(substr($nombre, 0, 1));
                    ?>

                    <img src="https://placehold.co/40x40/585858/fff?text=<?php echo e($letra); ?>" alt="Avatar del creador">
                    <div>
                        <div class="creator-name"><?php echo e($petition->user->name); ?></div>
                        <div class="creator-desc">Creador/a de la Petición</div>
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
                        <h2 class="signature-count text-center"><?php echo e($petition->signatories); ?></h2>
                        <div class="signature-goal text-center">Firmas Verificadas</div>
                        <hr>
                        <?php if(Auth::guest()): ?>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-yellow rounded-2 py-2 fw-bold">
                                    <a class="btn-enlaces" href="<?php echo e(route('login')); ?>">Firmar la petición</a>
                                </button>
                            </div>
                        <?php else: ?>
                            <form action="<?php echo e(route('petitions.sign', $petition->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-yellow rounded-2 py-2 fw-bold">
                                        Firmar la petición
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <div class="mobile-sign-fixed d-lg-none">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="signature-count small"><?php echo e($petition->signatories); ?></div>
                <div class="signature-goal small" style="line-height: 1;">Firmas Verificadas</div>
            </div>
            <?php if(Auth::guest()): ?>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-yellow rounded-2 py-2 fw-bold">
                        <a class="btn-enlaces" href="<?php echo e(route('login')); ?>">Firmar la petición</a>
                    </button>
                </div>
            <?php else: ?>
                <form action="<?php echo e(route('petitions.sign', $petition->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-yellow rounded-2 py-2 fw-bold">
                            Firmar la petición
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/petitions/show.blade.php ENDPATH**/ ?>