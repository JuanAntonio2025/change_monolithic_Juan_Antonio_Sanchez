<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Categorías</h1>
        <div class="col-md-2 m-3">
            <a href="<?php echo e(route('admin.categories.create')); ?>" class="text-decoration-none">
                <div class="card text-white bg-success h-100">
                    <h5 class="card-title text-center p-2">Crear Categoría</h5>
                </div>
            </a>
        </div>
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

                        <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>"
                           class="btn btn-sm btn-primary">
                            Editar
                        </a>

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
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($categories->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/categories/show.blade.php ENDPATH**/ ?>