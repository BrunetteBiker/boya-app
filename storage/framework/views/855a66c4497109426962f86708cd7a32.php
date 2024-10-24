<table>
    <tbody>
    <tr>
        <td>№</td>
        <td>Status</td>
        <td>Məhsul kodu</td>
        <td>Məhsulun adı</td>
        <td>Qeyd</td>
        <td>Əlavə olunma tarixi</td>
        <td>Son düzəliş tarixi</td>
    </tr>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                <td><?php echo e($product->visible ? "Aktiv" : "Deaktiv"); ?></td>
                <td><?php echo e($product->pid); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->note); ?></td>
                <td><?php echo e($product->created_at->format("d-m-Y h:i:s")); ?></td>
                <td><?php echo e($product->updated_at->format("d-m-Y h:i:s")); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\boya-app\resources\views/export/products.blade.php ENDPATH**/ ?>