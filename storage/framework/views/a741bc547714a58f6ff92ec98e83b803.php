<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset("pallet.ico")); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.54.1/apexcharts.min.css">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo app('Illuminate\Foundation\Vite')("resources/scss/app.scss"); ?>
    <title><?php echo e($title ?? 'Page Title'); ?></title>
</head>
<body>
<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('notification', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2629578069-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<div class="grid gap-4 p-4 bg-gray-200 min-h-dvh content-start">
    <?php if(auth()->check()): ?>

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.create', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2629578069-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <div class="my-container flex justify-between items-center sticky top-0 bg-white z-20">
            <div class="text-sm">İcraçı : <span class="font-bold"><?php echo e(auth()->user()->name); ?></span></div>
            <div class="flex gap-2 font-medium">
                <a href="<?php echo e(url('order/dashboard')); ?>" wire:navigate
                   class="border border-black p-2 text-sm">Sifarişlər</a>
                <a href="<?php echo e(url('user/dashboard')); ?>" wire:navigate class="border border-black p-2 text-sm">İstifadəçilər</a>
                <a href="<?php echo e(url("product/dashboard")); ?>" wire:navigate
                   class="border border-black p-2 text-sm">Məhsullar</a>
                <a href="<?php echo e(url("raport")); ?>"
                   class="border border-black p-2 text-sm">Hesabat</a>
                <a href="<?php echo e(url("logout")); ?>" class="border border-black p-2 text-sm">Çıxış</a>
            </div>
        </div>
    <?php endif; ?>
    <?php echo e($slot); ?>


</div>
<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


</body>
</html>
<?php /**PATH C:\laragon\www\boya-app\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>