<?php
    use Illuminate\Support\Facades\Auth;
?>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Change.org Clone</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .sidebar {
            width: 250px;
            min-height: 100vh;
            position: fixed;
            top: 56px;
            left: 0;
            background-color: #dc3545;
            color: white;
            padding-top: 20px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 15px 20px;
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.2);
            border-left: 5px solid #ffc107;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bolder text-danger" href="<?php echo e(route('admin.home')); ?>">
            Change.org
        </a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="sidebar d-flex flex-column pt-0">
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="<?php echo e(route('admin.home')); ?>" class="nav-link <?php echo e(request()->is('admin') ? 'active' : ''); ?>">
                <i class="bi bi-house me-2"></i> Home
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('admin.petitions.index')); ?>" class="nav-link <?php echo e(request()->is('admin/petitions*') ? 'active' : ''); ?>">
                <i class="bi bi-file-text me-2"></i> Peticiones
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link <?php echo e(request()->is('admin/users*') ? 'active' : ''); ?>">
                <i class="bi bi-people-fill me-2"></i> Usuarios
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('admin.categories.index')); ?>" class="nav-link <?php echo e(request()->is('admin/categories*') ? 'active' : ''); ?>">
                <i class="bi bi-tags-fill me-2"></i> Categorías
            </a>
        </li>
    </ul>
</div>

<div class="main-content pt-5">
    <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const navbarHeight = document.querySelector('.navbar').offsetHeight;
    document.querySelector('.main-content').style.paddingTop = navbarHeight + 'px';
</script>
</body>
</html>
<?php /**PATH C:\Users\Alumno\Desktop\Repositorios\change_monolithic_Juan_Sanchez\resources\views/layouts/admin.blade.php ENDPATH**/ ?>