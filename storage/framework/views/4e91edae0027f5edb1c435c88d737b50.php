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
    <div class="grid gap-4 p-4 2xl:px-80 bg-gray-200 min-h-dvh content-start">
        <?php if(auth()->check()): ?>
            <div class="my-container">
                <div class="flex justify-end gap-2 font-medium">
                    <a href="<?php echo e(url('order/dashboard')); ?>" wire:navigate>Sifarişlər</a>
                    <a href="">Müştərilər</a>
                    <a href="">Məhsullar</a>
                    <a href="">Şəxsi kabinet</a>
                    <a href="">Çıxış</a>
                </div>
            </div>
        <?php endif; ?>
        <?php echo e($slot); ?>


    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    </body>
</html>
<?php /**PATH C:\laragon\www\boya\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>