<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4">Crear Nueva Petición</h1>

        <form action="<?php echo e(route('admin.petitions.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <!-- Título -->
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title')); ?>" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="4" required><?php echo e(old('description')); ?></textarea>
            </div>

            <!-- Destinatario (addressee) -->
            <div class="mb-3">
                <label for="addressee" class="form-label">Destinatario</label>
                <input type="text" class="form-control" id="addressee" name="addressee" value="<?php echo e(old('addressee')); ?>" required>
            </div>

            <!-- Número de firmantes (signatories) -->
            <div class="mb-3">
                <label for="signatories" class="form-label">Firmantes</label>
                <input type="number" class="form-control" id="signatories" name="signatories" value="<?php echo e(old('signatories', 0)); ?>" min="0">
            </div>

            <!-- Estado -->
            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="pending" selected>Pending</option>
                    <option value="accepted">Accepted</option>
                </select>
            </div>

            <!-- Usuario (user_id) -->
            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> (<?php echo e($user->email); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Categoría (category_id) -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Subir imágenes -->
            <div class="mb-3">
                <label for="images" class="form-label">Imágenes de la petición</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple>
                <small class="text-muted">Puedes subir varias imágenes. Se almacenarán en <code>public/fotos</code></small>
            </div>

            <button type="submit" class="btn btn-success">Crear Petición</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/petitions/edit-add.blade.php ENDPATH**/ ?>