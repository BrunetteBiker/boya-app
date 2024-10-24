<table>
    <tbody>
    <tr>
        <td>№</td>
        <td>Ödəniş kodu</td>
        <td>Status</td>
        <td>Tarix</td>
        <td>Məbləğ</td>
        <td>Ödəyici</td>
        <td>İcraçı</td>
        <td>Təsnifat</td>
        <td>Əməliyyat</td>
        <td>Qeyd</td>
        <td>Ləğv edən</td>
        <td>Ləğv səbəbi</td>
    </tr>
    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($payment->pid); ?></td>
            <td><?php echo e($payment->is_cancelled == true ? "Aktiv" : "Ləğv edilib"); ?></td>
            <td><?php echo e($payment->created_at->format("d-m-Y h:i")); ?></td>
            <td><?php echo e($payment->amount); ?> AZN</td>
            <td><?php echo e($payment->customer->name); ?></td>
            <td><?php echo e($payment->executor->name); ?></td>
            <td><?php echo e($payment->type->name); ?></td>
            <td><?php echo e($payment->action->name); ?></td>
            <td><?php echo e($payment->note); ?></td>
            <td><?php echo e($payment->is_cancelled == true ? $payment->cancelledUser->name : ""); ?></td>
            <td><?php echo e($payment->explanation); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\boya-app\resources\views/export/payments.blade.php ENDPATH**/ ?>