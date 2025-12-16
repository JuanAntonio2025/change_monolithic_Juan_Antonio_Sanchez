<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Detalles de la Petición</h1>
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                Información General
            </div>
            <div class="card-body">
                <p><strong>Título:</strong> <?php echo e($petition->title); ?></p>
                <p><strong>Categoría:</strong> <?php echo e($petition->category->name); ?></p>
                <p><strong>Autor:</strong> <?php echo e($petition->user->name); ?></p>
                <p><strong>Dirigido a:</strong> <?php echo e($petition->addressee); ?></p>
                <p><strong>Firmas:</strong> <?php echo e($petition->signatories); ?></p>
                <p><strong>Estado:</strong> <span class="badge <?php if($petition->status == 'accepted'): ?> bg-success <?php else: ?> bg-warning <?php endif; ?>"><?php echo e($petition->status); ?></span></p>
                <p><strong>Fecha de Creación:</strong> <?php echo e($petition->created_at->format('d/m/Y H:i')); ?></p>

                <hr>

                <h4>Descripción</h4>
                <div class="alert alert-light border">
                    <?php echo nl2br(e($petition->description)); ?>

                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                Imagen Asociada
            </div>
            <div class="card-body">
                <?php if($petition->files->isNotEmpty()): ?>
                    <div class="row">
                        <?php $__currentLoopData = $petition->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img src="<?php echo e(asset($file->file_path)); ?>" class="card-img-top" alt="<?php echo e($file->name); ?>" style="height: 200px; object-fit: cover;">
                                    <div class="card-footer">
                                        <small class="text-muted"><?php echo e($file->name); ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <p class="text-muted">No hay imágenes asociadas a esta petición.</p>
                <?php endif; ?>
            </div>
        </div>
        <a href="<?php echo e(route('admin.petitions.edit', $petition->id)); ?>" class="btn btn-primary">Editar</a>
        <a href="<?php echo e(route('admin.petitions.show')); ?>" class="btn btn-secondary">Volver al Listado</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/petitions/details.blade.php ENDPATH**/ ?>