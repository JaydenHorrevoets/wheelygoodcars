<?php $__env->startSection('content'); ?>

    <div class="fullheight">
        <div class="card p-4" style="min-width: 50%;">
            <div class="card-body">
                <h5 class="card-title mb-3">Inloggen</h5>
                <?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="<?php echo e(route('login.do')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 row">
                        <label for="email" class="col-form-label col-sm-4">E-mailadres:</label>
                        <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"></div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-form-label col-sm-4">Wachtwoord:</label>
                        <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" id="password"></div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary text-dark" value="Inloggen">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\wheelygoodcars\resources\views/auth/login.blade.php ENDPATH**/ ?>