

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Productos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($p->id); ?></td>
                    <td><?php echo e($p->nombre); ?></td>
                    <td><?php echo e($p->descripcion); ?></td>
                    <td>$<?php echo e($p->precio); ?></td>
                    <td><?php echo e($p->stock); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5">No hay productos registrados</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\Lab-Laravel\laravel\resources\views/productos/index.blade.php ENDPATH**/ ?>