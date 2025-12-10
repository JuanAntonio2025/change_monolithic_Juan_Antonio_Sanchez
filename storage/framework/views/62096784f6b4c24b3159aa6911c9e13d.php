<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4">Panel de Administración</h1>
        <div class="row g-4">

            <!-- Panel Peticiones -->
            <div class="col-md-4">
                <a href="<?php echo e(route('admin.petitions.index')); ?>" class="text-decoration-none">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-file-text display-4 mb-3"></i>
                            <h5 class="card-title">Peticiones</h5>
                            <p class="card-text">Ver y gestionar todas las peticiones.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Panel Usuarios -->
            <div class="col-md-4">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="text-decoration-none">
                    <div class="card text-white bg-primary h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-people-fill display-4 mb-3"></i>
                            <h5 class="card-title">Usuarios</h5>
                            <p class="card-text">Gestionar los usuarios registrados.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Panel Categorías -->
            <div class="col-md-4">
                <a href="<?php echo e(route('admin.categories.index')); ?>" class="text-decoration-none">
                    <div class="card text-white bg-success h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-tags-fill display-4 mb-3"></i>
                            <h5 class="card-title">Categorías</h5>
                            <p class="card-text">Gestionar las categorías disponibles.</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/home.blade.php ENDPATH**/ ?>