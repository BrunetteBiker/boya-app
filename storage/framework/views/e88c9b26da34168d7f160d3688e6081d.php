<div class="grid gap-4">
    <!--[if BLOCK]><![endif]--><?php if($selectedId): ?>
        <div class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur z-10 p-8 grid items-center justify-items-center">
            <form wire:submit="create" class="my-container grid gap-4 w-1/4">
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Məhsulun adı</div>
                    <input type="text" class="border border-black p-3 flex-1" placeholder="Daxil edin"
                           wire:model="selectedProduct.name">
                </div>
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Qeyd</div>
                    <textarea class="my-input" rows="3" wire:model="selectedProduct.note"></textarea>
                </div>
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Status</div>
                    <select class="my-input" wire:model="selectedProduct.visible">
                        <option value="1">Aktiv</option>
                        <option value="0">Deaktiv</option>
                    </select>
                </div>
                <div class="flex gap-2 justify-end">
                    <button wire:click="modify" type="button" class="border border-black leading-none font-medium p-3">
                        Düzəliş et
                    </button>
                    <button wire:click="$set('selectedId','')" type="button"
                            class="border border-black leading-none font-medium p-3">Gizlə
                    </button>
                </div>
            </form>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($newProduct["state"]): ?>
            <div class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur grid justify-items-center content-start p-8 z-20">
                <div class="my-container grid gap-4 w-1/3">
                    <div class="grid gap-1">
                        <div class="text-sm font-medium">Məhsulun adı</div>
                        <input type="text" class="border border-black p-3 flex-1" placeholder="Daxil edin"
                               wire:model="newProduct.name">
                    </div>
                    <div class="grid gap-1">
                        <div class="text-sm font-medium">Qeyd</div>
                        <textarea name="" class="my-input" rows="3"></textarea>
                    </div>
                    <div class="grid gap-1">
                        <div class="text-sm font-medium">Status</div>
                        <select name="" id="" class="my-input">
                            <option value="">Satışdadır</option>
                            <option value="">Satışda deyil</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button wire:click="create" type="submit" class="my-input font-medium transition hover:text-green-600">Yadda saxla</button>
                        <button wire:click="$toggle('newProduct.state')" type="submit" class="my-input font-medium transition hover:text-red-600">Ləğv et</button>
                    </div>
                </div>
            </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class="flex gap-4 items-start">
        <div class="grid gap-3 flex-1">
            <div class="flex flex-wrap gap-3">
                <div class="my-container grid">
                    <p class="text-xl font-bold ml-auto"><?php echo e(\App\Models\Product::count()); ?> ədəd</p>
                    <p class="text-sm">Bütün məhsullar</p>
                </div>
                <div class="my-container grid">
                    <p class="text-xl font-bold ml-auto"><?php echo e(\App\Models\Product::where("visible",true)->count()); ?> ədəd</p>
                    <p class="text-sm">Aktiv məhsullar</p>
                </div>
                <div class="my-container grid">
                    <p class="text-xl font-bold ml-auto"><?php echo e(\App\Models\Product::where("visible",false)->count()); ?> ədəd</p>
                    <p class="text-sm">Deaktiv məhsullar</p>
                </div>
            </div>
            <input type="text" class="my-input mr-auto w-72" placeholder="Sürətli axtarış" wire:model.live="filters.keyword">
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
                                <button wire:click="select(<?php echo e($product->id); ?>)" class="my-input inline-flex items-center gap-1.5 !p-2.5 text-sm font-medium">
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
                                <p class="line-clamp-1 transition hover:line-clamp-none">
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

        <div class="my-container w-80 grid gap-4 sticky top-4">
            <button class="my-container !p-3 inline-flex justify-center font-medium" wire:click="$toggle('newProduct.state')">Yeni məhsul</button>
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
            <div class="flex gap-3">
                <button wire:click="search" class="p-4 leading-none border border-black font-medium flex-1">Axtar
                </button>
                <button wire:click="resetSearch" class="p-4 leading-none border border-black font-medium flex-1">
                    Sıfırla
                </button>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/product/dashboard.blade.php ENDPATH**/ ?>