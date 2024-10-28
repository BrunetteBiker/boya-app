<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ödəniş qəbzi</title>
    <style>
        * {
            font-size: 10pt;
        }

        body {
            font-family: "DejaVu sans", sans-serif;
        }
    </style>
</head>
<body>
<h1 style="
    font-size: 1.65rem;
    text-align: center;
">Ödəniş qəbzi</h1>

<?php if($payment->is_cancelled): ?>
    <h2 style="font-size: 1.05rem;line-height: 1">LƏĞV EDİLİB</h2>
    <p style="border:1px black solid; padding: 0.5rem; font-size: 0.85rem; font-style: italic;"><span
            style="text-decoration: underline">Ləğv səbəbi</span
        >
        : <?php echo e($payment->explanation); ?></p>
<?php endif; ?>

<ul style="list-style-position: outside;">
    <li>Ödəniş kodu : <?php echo e($payment->pid); ?></li>
    <li>Ödəniş tarixi : <?php echo e($payment->created_at->format("d/m/Y h:i:s")); ?></li>
    <li>Məbləğ : <?php echo e($payment->amount); ?> AZN</li>
    <li>Təsnifat : <?php echo e($payment->type->name); ?></li>
    <li>Əməliyyat : <?php echo e($payment->action->name); ?></li>
    <li>İcraçı : <?php echo e($payment->executor->name); ?></li>
    <li>Ödəyici : <?php echo e($payment->customer->name); ?></li>
    <?php if(!is_null($payment->order_id)): ?>
        <li>Sifariş kodu : <?php echo e($payment->order->pid); ?></li>
    <?php endif; ?>
    <li>Çap tarixi : <?php echo e(now()->format("d/m/Y h:i:s")); ?></li>
</ul>


<?php if($payment->note != ""): ?>
    <p style="font-size: 0.85rem ; font-style: italic; border: 1px black solid; padding: 0.5rem"><span
            style="text-decoration: underline">Qeyd </span> : <?php echo e($payment->note); ?></p>
<?php endif; ?>


</body>
</html>
<?php /**PATH C:\laragon\www\boya-app\resources\views/print/payment.blade.php ENDPATH**/ ?>