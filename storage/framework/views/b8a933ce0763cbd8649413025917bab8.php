<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Petición</h1>
        <form action="<?php echo e(route('admin.petitions.update', $petition->id)); ?>"
              method="POST"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       value="<?php echo e(old('title', $petition->title)); ?>"
                       required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control"
                          id="description"
                          name="description"
                          rows="4"
                          required><?php echo e(old('description', $petition->description)); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="addressee" class="form-label">Destinatario</label>
                <input type="text"
                       class="form-control"
                       id="addressee"
                       name="addressee"
                       value="<?php echo e(old('addressee', $petition->addressee)); ?>"
                       required>
            </div>

            <div class="mb-3">
                <label for="signatories" class="form-label">Firmantes</label>
                <input type="number"
                       class="form-control"
                       id="signatories"
                       name="signatories"
                       value="<?php echo e(old('signatories', $petition->signatories)); ?>"
                       min="0">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Estado</label>
                <select class="form-select"
                        id="status"
                        name="status"
                        required>
                    <option value="pending" <?php echo e(old('status', $petition->status) == 'pending' ? 'selected' : ''); ?>>
                        Pending
                    </option>
                    <option value="accepted" <?php echo e(old('status', $petition->status) == 'accepted' ? 'selected' : ''); ?>>
                        Accepted
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <select class="form-select"
                        id="user_id"
                        name="user_id"
                        required>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php echo e($petition->user_id == $user->id ? 'selected' : ''); ?>>
                            <?php echo e($user->name); ?> (<?php echo e($user->email); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select class="form-select"
                        id="category_id"
                        name="category_id"
                        required>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e($petition->category_id == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Añadir nuevas imágenes</label>
                <input type="file"
                       class="form-control"
                       id="images"
                       name="images[]"
                       multiple>
                <small class="text-muted">Se almacenarán en <code>public/fotos</code></small>
            </div>

            <div class="mb-3">
                <label class="form-label">Imágenes actuales</label>
                <div class="d-flex flex-wrap gap-3">
                    <?php $__currentLoopData = $petition->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="position-relative">
                            <img src="<?php echo e(asset($file->file_path)); ?>"
                                 alt="<?php echo e($file->name); ?>"
                                 width="150"
                                 class="img-thumbnail">

                            <form action="<?php echo e(route('admin.petitions.delete', $file->id)); ?>"
                                  method="POST"
                                  class="position-absolute top-0 end-0"
                                  onsubmit="return confirm('¿Eliminar esta imagen?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">
                                    &times;
                                </button>
                            </form>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar Petición
            </button>
            <a href="<?php echo e(route('admin.petitions.show')); ?>" class="btn btn-secondary">Volver al Listado</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/petitions/update.blade.php ENDPATH**/ ?>