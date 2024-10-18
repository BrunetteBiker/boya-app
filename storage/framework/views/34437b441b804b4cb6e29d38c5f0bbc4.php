<div class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur grid justify-items-center p-8 items-start <?php echo e($state ? "" : "hidden"); ?>">
    <div class="my-container w-1/3 grid gap-4">
        <h1 class="text-2xl font-bold">Yeni müştəri blankı</h1>
        <div class="flex items-center gap-1.5">
            <div class="text-sm font-medium">İcraçıdır</div>
            <select class="my-input w-full" wire:model.live="data.role">
                <option value="">Seçin</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\UserRole::orderBy("name","asc")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>

        </div>
        <div class="flex items-center gap-1.5">
            <div class="text-sm font-medium">Ad və soyad</div>
            <input type="text" class="my-input flex-1" wire:model="data.name">
        </div>
        <div class="grid gap-1.5">
            <div class="text-sm font-medium">Əlaqə nömrəsi</div>
            <div class="grid gap-2 flex-1">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data["phones"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center gap-2 flex-1">
                        <input type="text" class="my-input flex-1" wire:model="data.phones.<?php echo e($index); ?>" x-mask="099-999-99-99">
                        <button wire:click="addPhone">
                            <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <line x1="12" y1="8" x2="12" y2="16"/>
                                <line x1="8" y1="12" x2="16" y2="12"/>
                            </svg>
                        </button>
                        <button wire:click="removePhone('<?php echo e($index); ?>')">
                            <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <line x1="8" y1="12" x2="16" y2="12"/>
                            </svg>
                        </button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

        </div>
        <!--[if BLOCK]><![endif]--><?php if($data["role"] == 2): ?>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center gap-1.5">
                    <div class="text-sm font-medium">Balans</div>
                    <input type="text" class="my-input w-full" wire:model="data.balance">
                </div>
                <div class="flex items-center gap-1.5">
                    <div class="text-sm font-medium">Faktiki borc</div>
                    <input type="text" class="my-input w-full" wire:model="data.oldDebt">
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($data["role"] == 3): ?>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-1.5 flex-1">
                    <div class="text-sm font-medium">Alış borcu</div>
                    <input type="number" step="0.01" class="my-input flex-1" wire:model="data.remnant">
                </div>
            </div>

        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <p wire:target="createUser" wire:loading class="text-sm font-medium animate-pulse">Sorğunuz icra olunur...</p>
        <div wire:loading.class="hidden" class="flex justify-end gap-3 text-sm font-semibold">
            <button wire:click="createUser" class="my-input">Əlavə et</button>
            <button wire:click="$dispatch('create-user')" class="my-input">Ləğv et</button>
        </div>


    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/user/create.blade.php ENDPATH**/ ?>