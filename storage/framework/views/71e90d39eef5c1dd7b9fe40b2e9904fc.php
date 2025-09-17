<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <h2>Mijn aangeboden auto's</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kenteken</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Bouwjaar</th>
                <th>Prijs</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($car->license_plate); ?></td>
                <td><?php echo e($car->merk); ?></td>
                <td><?php echo e($car->model); ?></td>
                <td><?php echo e($car->bouwjaar); ?></td>
                <td>€<?php echo e(number_format($car->price, 2, ',', '.')); ?></td>
                <td>
                    <form action="<?php echo e(route('cars.destroy', $car)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Weet je zeker dat je deze auto wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center">Je hebt nog geen auto's aangeboden.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="<?php echo e(route('cars.create')); ?>" class="btn btn-primary">Nieuwe auto aanbieden</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\wheelygoodcars\resources\views/cars/index.blade.php ENDPATH**/ ?>