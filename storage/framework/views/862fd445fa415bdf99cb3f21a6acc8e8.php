<div class="grid items-center justify-items-center h-dvh">
    <div class="my-container w-1/3 grid gap-3">
        <h1 class="text-3xl font-bold mb-3 text-blue-700">Portala giriş</h1>
        <hr class="border-2 border-zinc-100">
        <div class="flex gap-1.5">
            <select class="input input-large flex-1" wire:model="executorId">
                <option value="">İcraçını seçin</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->executors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $executor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($executor->id); ?>"><?php echo e($executor->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
            <button wire:click="login" class="btn btn-success">Daxil ol</button>
        </div>

        <p wire:loading wire:target="login" class="text-sm font-medium animate-pulse">Sorğunuz icra olunur...</p>


    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/login.blade.php ENDPATH**/ ?>