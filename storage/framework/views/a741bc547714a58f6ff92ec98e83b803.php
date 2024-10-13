<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo e($title ?? 'Page Title'); ?></title>
</head>
<body>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo app('Illuminate\Foundation\Vite')("resources/scss/app.scss"); ?>
    <title>Document</title>
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
<div class="grid gap-4 p-4 2xl:px-80 bg-gray-200 min-h-dvh content-start">
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

        <div class="my-container">
            <div class="flex justify-end gap-2 font-medium">
                <a href="<?php echo e(url('order/dashboard')); ?>" wire:navigate
                   class="border border-black p-2 text-sm">Sifarişlər</a>
                <a href="<?php echo e(url('user/dashboard')); ?>" wire:navigate class="border border-black p-2 text-sm">Müştərilər</a>
                <a href="<?php echo e(url("product/dashboard")); ?>" wire:navigate
                   class="border border-black p-2 text-sm">Məhsullar</a>
                <a href="" class="border border-black p-2 text-sm">Şəxsi kabinet</a>
                <a href="<?php echo e(url("logout")); ?>" wire:navigate class="border border-black p-2 text-sm">Çıxış</a>
            </div>
        </div>
    <?php endif; ?>
    <?php echo e($slot); ?>


</div>

<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\laragon\www\boya-app\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>