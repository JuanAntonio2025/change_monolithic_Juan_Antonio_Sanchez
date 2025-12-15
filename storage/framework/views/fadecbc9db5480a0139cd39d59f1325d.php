<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h1 class="mb-4 fw-bold">Mis peticiones</h1>
        <?php if($petitions->isEmpty()): ?>
            <div class="alert alert-info">
                Aún no has creado ninguna petición.
            </div>
        <?php else: ?>
            <div class="row g-4" id="peticion">
                <?php $__currentLoopData = $petitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-lg-3">
                        <a href="<?php echo e(route('petitions.show', $petition->id)); ?>" class="text-decoration-none text-dark">

                            <div class="petition-card">

                                <div class="petition-image-container">
                                    <?php
                                        $firstFile = $petition->files->first();
                                        $imagePath = $firstFile ? $firstFile->file_path : null;
                                    ?>

                                    <img src="<?php echo e(asset($imagePath)); ?>"
                                         class="petition-image"
                                         alt="<?php echo e($petition->title); ?>">
                                </div>

                                <div class="petition-details">
                                <span class="petition-category">
                                    <?php echo e($petition->category->name ?? 'Sin categoría'); ?>

                                </span>

                                    <h3 class="petition-title">
                                        <?php echo e($petition->title); ?>

                                    </h3>

                                    <p class="petition-signatures">
                                        <?php echo e($petition->signatories); ?> firmas
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\dioat\Desktop\Repositorios\change_monolithic_Juan_Antonio_Sanchez\resources\views/petitions/mine.blade.php ENDPATH**/ ?>