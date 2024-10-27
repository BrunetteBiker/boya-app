<div class="notification <?php echo e($state == '' ? "!hidden" : $state); ?>">
    <p class="notification-msg"><?php echo e($msg); ?></p>
    <button wire:click="resetNotify" class="notification-btn">
        <svg class="size-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z"/>
            <circle cx="12" cy="12" r="9"/>
            <path d="M9 12l2 2l4 -4"/>
        </svg>
    </button>
        <?php
        $__scriptKey = '3777710832-0';
        ob_start();
    ?>
    <script>
        Livewire.on('autoHide', function () {
            setTimeout(function () {
                Livewire.dispatch("notify")
            }, 3000)
        })
        Livewire.on('reload', function () {
            setTimeout(function () {
                location.reload()
            }, 3000)
        })
        Livewire.on('redirect', function ({url}) {
            setTimeout(function () {
                location.href = url
            }, 2500)
        })
    </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/notification.blade.php ENDPATH**/ ?>