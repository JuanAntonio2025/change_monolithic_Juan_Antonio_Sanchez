<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Usuarios</h1>
        <div class="col-md-2 m-3">
            <a href="<?php echo e(route('admin.users.create')); ?>" class="text-decoration-none">
                <div class="card text-white bg-success h-100">
                    <h5 class="card-title text-center p-2">Crear Usuario</h5>
                </div>
            </a>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Role</th>
                <th>Creada</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->role == 1 ? 'Administrador' : 'Usuario'); ?></td>
                    <td><?php echo e(optional($user->created_at)->format('d/m/Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="btn btn-primary btn-sm">Editar</a>

                        <form action="<?php echo e(route('admin.users.delete', $user->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/admin/users/show.blade.php ENDPATH**/ ?>