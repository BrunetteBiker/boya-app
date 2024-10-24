<div class="flex items-start gap-4" x-data="{state : $wire.entangle('searchState')}">
    <div class="flex-1 grid gap-4">
        <div class="flex flex-wrap gap-3">
            <div class="p-6 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg shadow-md">
                <p class="text-3xl font-extrabold text-white"><?php echo e($this->summary["all"]["count"]); ?> | <?php echo e($this->summary["all"]["funds"]); ?></p>
                <p class="text-lg font-medium text-gray-200 mt-1.5"><?php echo e($this->summary["all"]["name"]); ?></p>
            </div>
            <div class="p-6 bg-gradient-to-r from-red-500 to-orange-600 rounded-lg shadow-md">
                <p class="text-3xl font-extrabold text-white"><?php echo e($this->summary["hasDebt"]["count"]); ?> | <?php echo e($this->summary["hasDebt"]["funds"]); ?></p>
                <p class="text-lg font-medium text-gray-200 mt-1.5"><?php echo e($this->summary["hasDebt"]["name"]); ?></p>
            </div>
            <div class="p-6 bg-gradient-to-r from-gray-500 to-gray-700 rounded-lg shadow-md">
                <p class="text-3xl font-extrabold text-white"><?php echo e($this->summary["cancelled"]["count"]); ?> | <?php echo e($this->summary["cancelled"]["funds"]); ?></p>
                <p class="text-lg font-medium text-gray-200 mt-1.5"><?php echo e($this->summary["cancelled"]["name"]); ?></p>
            </div>
            <div class="p-6 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-lg shadow-md">
                <p class="text-3xl font-extrabold text-white"><?php echo e($this->summary["inProgress"]["count"]); ?> | <?php echo e($this->summary["inProgress"]["funds"]); ?></p>
                <p class="text-lg font-medium text-gray-200 mt-1.5"><?php echo e($this->summary["inProgress"]["name"]); ?></p>
            </div>
            <div class="p-6 bg-gradient-to-r from-green-400 to-green-600 rounded-lg shadow-md">
                <p class="text-3xl font-extrabold text-white"><?php echo e($this->summary["completed"]["count"]); ?> | <?php echo e($this->summary["completed"]["funds"]); ?></p>
                <p class="text-lg font-medium text-gray-200 mt-1.5"><?php echo e($this->summary["completed"]["name"]); ?></p>
            </div>
            <div class="p-6 bg-gradient-to-r from-teal-400 to-teal-600 rounded-lg shadow-md">
                <p class="text-3xl font-extrabold text-white"><?php echo e($this->summary["delivered"]["count"]); ?> | <?php echo e($this->summary["delivered"]["funds"]); ?></p>
                <p class="text-lg font-medium text-gray-200 mt-1.5"><?php echo e($this->summary["delivered"]["name"]); ?></p>
            </div>
        </div>
        <div class="my-container flex items-center gap-5">
            <select class="input" wire:model.live="orderBy">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $sortings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sorting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($sorting); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>

            <div x-transition x-show="!state" class="inline-flex items-center gap-3">
                <input type="text" class="input" placeholder="Sifariş kodu"
                       wire:model.live="filters.pid">
                <button wire:click="$toggle('searchState')" class="link link-primary">Ətraflı axtarış</button>
            </div>


            <div class="flex gap-3 ml-auto">
                <button wire:click="export"
                        class="btn btn-outline btn-outline-primary">

                    <svg class="size-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z"/></svg>

                    <span wire:loading wire:target="export"
                          class="animate-pulse font-light">Məlumat emal olunur...</span>
                    <span wire:loading.class="hidden" wire:target="export">
                        Excel faylı
                    </span>
                </button>
                <a href="<?php echo e(url("order/create")); ?>" wire:navigate
                   class="btn btn-success">
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Yeni
                    sifariş</a>
            </div>
        </div>
        <div class="my-container grid gap-4">
            <div class="overflow-auto whitespace-nowrap">
                <table class="custom-table">
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
                                   class="btn btn-outline btn-outline-primary btn-small">
                                    <svg class="size-4"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Ətraflı məlumat</span>
                                </a>
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
    <div x-show="state" x-transition class="w-80 grid gap-4 sticky top-4 p-4 bg-white shadow-[rgba(7,_65,_210,_0.1)_0px_9px_30px]" wire:keydown.enter="search" @click.outside="state = false">
        <div class="flex justify-between items-center gap-2">
            <p class="font-bold text-lg text-blue-700">Ətraflı axtarış</p>
            <button wire:click="$toggle('searchState')" class="btn btn-outline btn-small btn-outline-disabled !cursor-pointer">Gizlə</button>
        </div>
        <hr class="border-2 border-zinc-100">
        <div class="grid gap-1">
            <div class="text-sm font-medium">Sifariş kodu</div>
            <input type="text" class="input" wire:model="filters.pid">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Məhsul tərkibi</div>
            <input type="text" class="input" wire:model="filters.receipt">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Müştəri</div>
            <input type="text" class="input" wire:model="filters.customer">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">İcraçı</div>
            <input type="text" class="input" placeholder="Sifariş kodu"
                   wire:model="filters.executor">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Status</div>
            <div class="grid gap-2">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\OrderStatus::orderBy("name","asc")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label for="order-status-<?php echo e($status->id); ?>" class="input">
                        <input type="checkbox" id="order-status-<?php echo e($status->id); ?>" wire:model="filters.status"
                               value="<?php echo e($status->id); ?>">
                        <span><?php echo e($status->name); ?></span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Yekun məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="input" placeholder="Min."
                       wire:model="filters.total.min">
                <input type="text" class="input" placeholder="Maks."
                       wire:model="filters.total.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Ödənilmiş məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="input" placeholder="Min."
                       wire:model="filters.paid.min">
                <input type="text" class="input" placeholder="Maks."
                       wire:model="filters.paid.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Borc</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="input" placeholder="Min."
                       wire:model="filters.debt.min">
                <input type="text" class="input" placeholder="Maks."
                       wire:model="filters.debt.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Endirim</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="input" placeholder="Min."
                       wire:model="filters.discount.min">
                <input type="text" class="input" placeholder="Maks."
                       wire:model="filters.discount.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Tarix</div>
            <div class="grid grid-cols-2 gap-2">
                <div class="grid gap-1">
                    <input type="text" class="input w-full" placeholder="gün-ay-il"
                           wire:model="filters.createdAt.min" x-mask="99-99-9999">
                    <span class="text-sm">Tarixdən</span>
                </div>
                <div class="grid gap-1">
                    <input type="text" class="input w-full" placeholder="gün-ay-il"
                           wire:model="filters.createdAt.max" x-mask="99-99-9999">
                    <span class="text-sm">Tarixə</span>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2">
            <button type="button" wire:click="search" class="btn btn-outline btn-outline-primary">Axtar
            </button>
            <button type="button" wire:click="search('true')" class="btn btn-outline btn-outline-disabled !cursor-pointer">
                Sıfırla
            </button>
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/order/dashboard.blade.php ENDPATH**/ ?>