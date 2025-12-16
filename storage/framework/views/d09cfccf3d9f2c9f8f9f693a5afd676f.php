<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Peticiones</h1>
        <div class="row g-4">

            <!-- Panel Ver Peticiones -->
            <div class="col-md-4">
                <a href="<?php echo e(route('admin.petitions.show')); ?>" class="text-decoration-none">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-file-text display-4 mb-3"></i>
                            <h5 class="card-title">Ver Peticiones</h5>
                            <p class="card-text">Listado completo de peticiones.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Panel Crear Petición -->
            <div class="col-md-4">
                <a href="<?php echo e(route('admin.petitions.create')); ?>" class="text-decoration-none">
                    <div class="card text-white bg-success h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-plus-circle display-4 mb-3"></i>
                            <h5 class="card-title">Crear Petición</h5>
                            <p class="card-text">Añadir una nueva petición al sistema.</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/petitions/index.blade.php ENDPATH**/ ?>