<!doctype html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WheelyGoodCars</title>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.scss', 'resources/js/app.js']); ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark d-print-none bg-black">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><strong class="text-primary">Wheely</strong> good cars<strong class="text-primary">!</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link text-light" href="">Alle auto's</a></li>
                            <?php if(auth()->guard()->check()): ?>
                                <li class="nav-item"><a class="nav-link text-light" href="">Mijn aanbod</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="">Aanbod plaatsen</a></li>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item"><a class="nav-link text-secondary"   href="<?php echo e(route('register')); ?>">Registreren</a></li>
                            <li class="nav-item"><a class="nav-link text-secondary" href="<?php echo e(route('login')); ?>">Inloggen</a></li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item"><a class="nav-link text-secondary"   href="<?php echo e(route('logout')); ?>">Uitloggen</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>
</html>
<?php /**PATH C:\laragon\www\wheelygoodcars\resources\views/layouts/app.blade.php ENDPATH**/ ?>