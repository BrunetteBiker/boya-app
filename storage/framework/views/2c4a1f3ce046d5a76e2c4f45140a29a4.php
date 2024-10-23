<table>
    <tbody>
    <tr>
        <td>№</td>
        <td>Sifariş kodu</td>
        <td>Müştəri</td>
        <td>İcraçı</td>
        <td>Cəm</td>
        <td>Ödənilib</td>
        <td>Borc</td>
        <td>Status</td>
        <td>Tarix</td>
    </tr>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($order->pid); ?></td>
            <td><?php echo e($order->customer->name); ?></td>
            <td><?php echo e($order->executor->name); ?></td>
            <td><?php echo e($order->total); ?> AZN</td>
            <td><?php echo e($order->paid); ?> AZN</td>
            <td><?php echo e($order->debt); ?> AZN</td>
            <td><?php echo e($order->status->name); ?></td>
            <td><?php echo e($order->created_at->format("d-m-Y h:i")); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\boya-app\resources\views/export/orders.blade.php ENDPATH**/ ?>