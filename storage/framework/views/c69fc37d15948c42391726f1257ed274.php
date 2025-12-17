<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Peticiones</h1>
        <div class="col-md-2 m-3">
            <a href="<?php echo e(route('admin.petitions.create')); ?>" class="text-decoration-none">
                <div class="card text-white bg-success h-100">
                    <h5 class="card-title text-center p-2">Crear Petición</h5>
                </div>
            </a>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Título</th>
                <th>Categoría</th>
                <th>Autor</th>
                <th>Firmas</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $petitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($petition->title); ?></td>
                    <td><?php echo e($petition->category->name); ?></td>
                    <td><?php echo e($petition->user->name); ?></td>
                    <td><?php echo e($petition->signatories); ?></td>
                    <td><?php echo e($petition->status); ?></td>
                    <td><?php echo e($petition->created_at->format('d/m/Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.petitions.details', $petition->id)); ?>" class="btn btn-sm btn-info text-white">Detalles</a>

                        <a href="<?php echo e(route('admin.petitions.edit', $petition->id)); ?>" class="btn btn-sm btn-primary">Editar</a>

                        <form action="<?php echo e(route('admin.petitions.deletePetition', $petition->id)); ?>"
                              method="POST"
                              style="display:inline-block;"
                              onsubmit="return confirm('¿Estás seguro?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($petitions->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/petitions/show.blade.php ENDPATH**/ ?>