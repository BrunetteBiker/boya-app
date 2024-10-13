<div class="grid gap-4">

    <div class="my-container flex gap-3 justify-end">
        <a href="" class="font-medium underline">Axtarış</a>
        <button wire:click="$dispatch('create-user')" class="font-medium underline">Yeni istifadəçi</button>
    </div>
    <div class="flex gap-4 items-start">
        <div class="my-container flex-1 grid gap-4">
            <div class="overflow-auto whitespace-nowrap">
                <table class="my-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>İstifadəçi kodu</th>
                    <th>Ad və soyad</th>
                    <th>Əlaqə nömrəsi</th>
                    <th>Balans</th>
                    <th>Borc</th>
                    <th>Kəsir</th>
                    <th>Vəzifə</th>
                    <th>Qeydiyyat tarixi</th>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <button
                                    class="whitespace-nowrap inline-flex gap-2 items-center border border-black p-2.5 text-sm">
                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Düzəliş et
                                </button>
                            </td>
                            <td><?php echo e($user->pid()); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td class="whitespace-normal">
                                <p class="line-clamp-1 hover:line-clamp-none w-80">
                                    <?php echo e($user->phones->pluck("item")->implode(",")); ?>

                                </p>
                            </td>
                            <td><?php echo e($user->balance); ?> AZN</td>
                            <td><?php echo e($user->debt); ?> AZN</td>
                            <td><?php echo e($user->remnant); ?> AZN</td>
                            <td><?php echo e($user->role->name); ?></td>
                            <td><?php echo e($user->created_at->format("d-m-Y h:i")); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
            <?php echo e($this->users->links()); ?>

        </div>
        <div class="my-container w-80 grid gap-3">
            <div class="grid gap-1">
                <div class="my-label">İstifadəçi kodu</div>
                <input type="text" class="my-input !p-2.5" wire:model="filters.pid">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ad və soyad</div>
                <input type="text" class="my-input !p-2.5" wire:model="filters.name">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Əlaqə nömrəsi</div>
                <input type="text" class="my-input !p-2.5" wire:model="filters.phone" x-mask="099-999-99-99">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Vəzifə</div>
                <div class="grid gap-2">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\UserRole::orderBy("name","asc")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label for="role-<?php echo e($role->id); ?>"
                               class="my-input inline-flex items-center gap-1.5 !p-2.5 text-sm cursor-pointer">
                            <input type="checkbox" id="role-<?php echo e($role->id); ?>" value="<?php echo e($role->id); ?>" wire:model="filters.roles">
                            <span><?php echo e($role->name); ?></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Balans</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="my-input !p-2.5" placeholder="Min." wire:model="filters.balance.min">
                    <input type="number" step="0.01" class="my-input !p-2.5" placeholder="Maks." wire:model="filters.balance.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Borc</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="my-input !p-2.5" placeholder="Min." wire:model="filters.debt.min">
                    <input type="number" step="0.01" class="my-input !p-2.5" placeholder="Maks." wire:model="filters.debt.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Kəsir</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="my-input !p-2.5" placeholder="Min." wire:model="filters.remnant.min">
                    <input type="number" step="0.01" class="my-input !p-2.5" placeholder="Maks." wire:model="filters.remnant.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Qeydiyyat tarixi</div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="grid gap-1">
                        <input type="text" class="my-input !p-2.5 w-full" placeholder="gün-ay-il" x-mask="99-99-9999">
                        <span class="text-xs">Tarixdən</span>
                    </div>
                    <div class="grid gap-1">
                        <input type="text" class="my-input !p-2.5 w-full" placeholder="gün-ay-il" x-mask="99-99-9999">
                        <span class="text-xs">Tarixə</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <button wire:click="search" class="border border-black p-3 font-medium">Axtar</button>
                <button wire:click="search('true')" class="border border-black p-3 font-medium">Sıfırla</button>
            </div>
        </div>
    </div>


</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/user/dashboard.blade.php ENDPATH**/ ?>