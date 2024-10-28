<div
    class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur grid justify-items-center p-8 items-start <?php echo e($state ? "" : "hidden"); ?> z-20">
    <div class="my-container w-1/3 grid gap-4" wire:click.outside="$dispatch('create-user')">
        <div class="flex justify-between gap-4 items-center text-blue-700">
            <h1 class="text-3xl font-semibold">Yeni müştəri blankı</h1>
            <button wire:click="$dispatch('create-user')">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </button>
        </div>
        <hr class="border-2 border-zinc-100">
        <div class="flex items-center gap-1.5">
            <div class="my-label">İstifadəçi növü</div>
            <select class="input flex-1" wire:model.live="data.role">
                <option value="">Seçin</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\UserRole::orderBy("name","asc")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>

        </div>
        <div class="flex items-center gap-1.5">
            <div class="my-label">Ad və soyad</div>
            <input type="text" class="input flex-1" wire:model="data.name">
        </div>
        <div class="grid gap-1.5">
            <div class="my-label">Əlaqə nömrəsi</div>
            <div class="grid gap-2 flex-1">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data["phones"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center gap-2 flex-1">
                        <input type="text" class="input flex-1" wire:model="data.phones.<?php echo e($index); ?>"
                               x-mask="099-999-99-99" placeholder="050-123-45-67">
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
        <div class="grid gap-2.5">
            <div class="flex items-center gap-1.5">
                <div class="my-label">Balans</div>
                <input type="text" class="input flex-1" wire:model="data.balance">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="my-label">Öncədən olan borc</div>
                <input type="text" class="input flex-1" wire:model="data.oldDebt">
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-1.5 flex-1">
                    <div class="my-label">Tədarükçü borcu</div>
                    <input type="number" step="0.01" class="input flex-1" wire:model="data.remnant">
                </div>
            </div>
        </div>

        <button wire:click="createUser" class="btn btn-success btn-large inline-flex items-center justify-center">
            <svg class="size-4"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="9" cy="7" r="4" />  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />  <path d="M16 11h6m-3 -3v6" /></svg>
            Əlavə et
        </button>

        <p wire:target="createUser" wire:loading class="text-sm font-medium animate-pulse">Sorğunuz icra olunur...</p>


    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/user/create.blade.php ENDPATH**/ ?>