<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4">Listado de Categorías</h1>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Creada</th>
                <th>Actualizada</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->id); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->created_at->format('d/m/Y')); ?></td>
                    <td><?php echo e($category->updated_at->format('d/m/Y')); ?></td>
                    <td class="d-flex gap-2">

                        <!-- Editar -->
                        <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>"
                           class="btn btn-sm btn-primary">
                            Editar
                        </a>

                        <!-- Eliminar -->
                        <form action="<?php echo e(route('admin.categories.delete', $category->id)); ?>"
                              method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/categories/show.blade.php ENDPATH**/ ?>