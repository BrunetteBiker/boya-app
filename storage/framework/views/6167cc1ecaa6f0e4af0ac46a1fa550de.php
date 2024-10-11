<div class="notification <?php echo e($state == '' ? "!hidden" : $state); ?>">
    <p class="notification-msg"><?php echo e($msg); ?></p>
    <button wire:click="resetNotify" class="notification-btn">Oldu</button>

        <?php
        $__scriptKey = '2323144410-0';
        ob_start();
    ?>
    <script>
        Livewire.on('autoHide', function () {
            setTimeout(function () {
                Livewire.dispatch("notify")
            }, 3000)
        })
        Livewire.on('redirect', function ({url}) {
            setTimeout(function () {
                location.href = url
            })
        })
    </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

</div>
<?php /**PATH C:\laragon\www\boya\resources\views/livewire/notification.blade.php ENDPATH**/ ?>