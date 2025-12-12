<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4">Crear Nuevo Usuario</h1>

        <form method="POST" action="<?php echo e(route('admin.users.store')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select name="role" class="form-select">
                    <option value="0" <?php echo e(old('role') == 0 ? 'selected' : ''); ?>>Usuario</option>
                    <option value="1" <?php echo e(old('role') == 1 ? 'selected' : ''); ?>>Administrador</option>
                </select>
            </div>

            <button class="btn btn-success">Crear Usuario</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/users/edit-add.blade.php ENDPATH**/ ?>