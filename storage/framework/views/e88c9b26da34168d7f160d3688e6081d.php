<div class="grid gap-4">
    <!--[if BLOCK]><![endif]--><?php if($selectedId): ?>
        <?php echo $__env->make("livewire.product.edit", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($newProduct["state"]): ?>
        <?php echo $__env->make("livewire.product.create", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="flex gap-4 items-start">
        <div class="grid gap-3 flex-1">
            <div class="flex flex-wrap gap-3">
                <div class="my-container grid gap-2 min-w-44">
                    <p class="text-2xl font-bold ml-auto"><?php echo e(\App\Models\Product::count()); ?> ədəd</p>
                    <p class="text-sm">Bütün məhsullar</p>
                </div>
                <div class="my-container grid gap-2 min-w-44">
                    <p class="text-2xl font-bold ml-auto"><?php echo e(\App\Models\Product::where("visible",true)->count()); ?>

                        ədəd</p>
                    <p class="text-sm">Aktiv məhsullar</p>
                </div>
                <div class="my-container grid gap-2 min-w-44">
                    <p class="text-2xl font-bold ml-auto"><?php echo e(\App\Models\Product::where("visible",false)->count()); ?>

                        ədəd</p>
                    <p class="text-sm">Deaktiv məhsullar</p>
                </div>
            </div>
            <div class="my-container grid gap-4 overflow-auto">
                <table class="my-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>Məhsul kodu</th>
                    <th>Məhsulun adı</th>
                    <th>Qeyd</th>
                    <th>Status</th>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="whitespace-nowrap">
                                <button wire:click="select(<?php echo e($product->id); ?>)"
                                        class="my-input inline-flex items-center gap-1.5 !p-2.5 text-sm font-medium">
                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Düzəliş et
                                </button>
                            </td>
                            <td>
                                <?php echo e($product->pid()); ?>

                            </td>
                            <td><?php echo e($product->name); ?></td>
                            <td>
                                <p class="whitespace-normal w-72 line-clamp-1 transition hover:line-clamp-none">
                                    <?php echo e($product->note); ?>

                                </p>
                            </td>
                            <td><?php echo e($product->visible ? "Aktiv" : "Deaktiv"); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
                <?php echo e($this->products->links()); ?>

            </div>
        </div>

        <div class="w-80 grid gap-4 sticky top-4">
            <button
                class="my-container inline-flex gap-2 justify-center items-center font-semibold transition hover:text-green-600"
                wire:click="$toggle('newProduct.state')">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Yeni məhsul
            </button>
            <div class="my-container grid gap-4">
                <div class="grid gap-1">
                    <div class="my-label">Sıralama</div>
                    <select class="my-input" wire:model.live="orderBy">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $sortings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sorting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($sorting); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Məhsulun adı</div>
                    <input type="text" class="my-input w-full" wire:model="filters.name">
                </div>
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Status</div>
                    <select class="my-input w-full" wire:model="filters.visible">
                        <option value="">Ümumi</option>
                        <option value="1">Aktiv</option>
                        <option value="0">Passiv</option>
                    </select>

                </div>
                <div class="flex justify-end gap-3">
                    <button wire:click="search" class="my-input inline-flex items-center gap-1.5 !p-2 text-sm hover:text-blue-600">
                        <svg class="size-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Axtar
                    </button>
                    <button wire:click="search(true)" class="my-input inline-flex items-center gap-1.5 !p-2 text-sm hover:text-gray-600">
                        <svg class="size-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M19 19h-11l-4 -4a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9 9" />  <path d="M18 12.3l-6.3 -6.3" /></svg>
                        Sıfırla
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/product/dashboard.blade.php ENDPATH**/ ?>