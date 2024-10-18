<div class="flex items-start gap-4" x-data="{state : $wire.entangle('searchState')}">
    <div class="flex-1 grid gap-4">
        <div class="my-container flex gap-8">
            <div class="inline-flex gap-1.5 items-center">
                <div class="text-sm font-medium">Sıralama</div>
                <select name="" id="" class="border text-sm border-black p-2">
                    <option value="">Öncə yenilər</option>
                </select>
            </div>
            <div x-transition x-show="!state" class="inline-flex items-center gap-1.5">
                <input type="text" class="my-input !p-2.5 text-sm" placeholder="Sifariş kodu">
                <button wire:click="$toggle('searchState')" class="underline text-sm">Ətraflı axtarış</button>
            </div>

            <a href="<?php echo e(url("order/create")); ?>" wire:navigate
               class="border border-black p-2.5 font-medium text-sm inline-flex items-center gap-1 ml-auto">
                <svg class="size-5"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Yeni
                sifariş</a>
        </div>
        <div class="my-container grid gap-4">
            <div class="overflow-auto whitespace-nowrap">
                <table class="my-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>Sifariş kodu</th>
                    <th>Status</th>
                    <th>Yekun</th>
                    <th>Ödənilib</th>
                    <th>Borc</th>
                    <th>Müştəri</th>
                    <th>İcraçı</th>
                    <th>Tarix</th>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(url("order/details/$order->id")); ?>" wire:navigate
                                   class="leading-none inline-flex items-center gap-1.5 text-sm font-medium underline border border-black p-3 ">Ətraflı
                                    məlumat</a>
                            </td>
                            <td><?php echo e($order->pid); ?></td>
                            <td><?php echo e($order->status->name); ?></td>
                            <td><?php echo e($order->total); ?> AZN</td>
                            <td><?php echo e($order->paid); ?> AZN</td>
                            <td><?php echo e($order->debt); ?> AZN</td>
                            <td>
                                <a href="<?php echo e(url("user/details/$order->customer_id")); ?>" wire:navigate>
                                    <?php echo e($order->customer->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($order->executor->name); ?></td>
                            <td><?php echo e($order->created_at->format("d-m-Y h:i:s")); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
            <?php echo e($this->orders->links()); ?>

        </div>
    </div>
    <div x-show="state" x-transition class="w-80 my-container grid gap-4 sticky top-4">
        <div class="flex justify-between items-center gap-2">
            <p class="font-semibold text-lg">Ətraflı axtarış</p>
            <button wire:click="$toggle('searchState')" class="my-input !p-1.5 text-xs ml-auto">Gizlə</button>
        </div>
        <hr class="border-2 border-black">

        <div class="grid gap-1">
            <div class="text-sm font-medium">Sifariş kodu</div>
            <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu" wire:model="filters.pid">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Müştəri</div>
            <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu" wire:model="filters.customer">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">İcraçı</div>
            <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu" wire:model="filters.executor">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Status</div>
            <div class="grid gap-1.5">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\OrderStatus::orderBy("name","asc")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label for="order-status-<?php echo e($status->id); ?>" class="my-input !p-2 text-sm cursor-pointer">
                        <input type="checkbox" id="order-status-<?php echo e($status->id); ?>" wire:model="filters.status" value="<?php echo e($status->id); ?>">
                        <span><?php echo e($status->name); ?></span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Yekun məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Min." wire:model="filters.total.min">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Maks." wire:model="filters.total.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Ödənilmiş məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Min." wire:model="filters.paid.min">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Maks." wire:model="filters.paid.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Borc</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Min." wire:model="filters.debt.min">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Maks." wire:model="filters.debt.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Endirim</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Min." wire:model="filters.discount.min">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Maks." wire:model="filters.discount.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Tarix</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="gün-ay-il" wire:model="filters.createdAt.min">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="gün-ay-il" wire:model="filters.createdAt.max">
            </div>
        </div>
        <div class="flex items-center justify-end gap-2">
            <button type="button" wire:click="search" class="leading-none p-3 rounded border border-black">Axtar</button>
            <button type="button" wire:click="search('true')" class="leading-none p-3 rounded border border-black">Sıfırla</button>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/order/dashboard.blade.php ENDPATH**/ ?>