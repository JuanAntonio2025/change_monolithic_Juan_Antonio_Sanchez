<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4">Crear Nueva Categoría</h1>

        <form action="<?php echo e(route('admin.categories.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <!-- Nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la Categoría</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="<?php echo e(old('name')); ?>"
                    required>
            </div>

            <button type="submit" class="btn btn-success">Crear Categoría</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/categories/edit-add.blade.php ENDPATH**/ ?>