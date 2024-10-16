<div class="grid gap-4">

    <!--[if BLOCK]><![endif]--><?php if($customer["state"]): ?>
        <div
            class="fixed top-0 left-0 h-dvh overflow-auto grid p-8 justify-items-center content-start bg-black/70 backdrop-blur w-full z-10">
            <div class="my-container w-1/2 grid gap-4">

                <div class="flex justify-between items-center">
                    <p class="text-2xl font-bold">Müştərilər</p>
                    <button class="my-input !p-2 text-sm inline-flex items-center gap-1.5"
                            wire:click="$toggle('customer.state')">
                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                        <span>Gizlə</span>
                    </button>
                </div>
                <hr class="border-2 border-black">
                <input type="text" class="my-input" placeholder="Axtarış..." wire:model.live="searchUser">
                <div class="overflow-auto max-h-96 whitespace-nowrap">
                    <table class="my-table">
                        <thead>
                        <th>Əməliyyatlar</th>
                        <th>İstifadəçi kodu</th>
                        <th>Ad və soyad</th>
                        <th>Əlaqə nömrəsi</th>
                        <th>Vəzifə</th>
                        <th>Borc</th>
                        <th>Balans</th>
                        </thead>
                        <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="flex gap-2">
                                        <label for="user-<?php echo e($user->id); ?>"
                                               class="my-input inline-flex items-center gap-1.5 text-sm !p-2.5">
                                            <input type="radio" value="<?php echo e($user->id); ?>" id="user-<?php echo e($user->id); ?>"
                                                   wire:change="selectCustomer($event.target.value)"
                                                   wire:model.live="customer.id">
                                            <span>Seç</span>
                                        </label>
                                        <a href="<?php echo e(url("user/details/$user->id")); ?>" wire:navigate
                                           class="my-input !p-2.5 text-sm inline-flex gap-1.5 items-center">
                                            <svg class="size-5" width="24" height="24" viewBox="0 0 24 24"
                                                 stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"/>
                                                <circle cx="12" cy="12" r="9"/>
                                                <line x1="12" y1="8" x2="12.01" y2="8"/>
                                                <polyline points="11 12 12 12 12 16 13 16"/>
                                            </svg>
                                            <span class="text-center flex-1">Ətraflı məlumat</span>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo e($user->pid()); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->phone()); ?></td>
                                <td><?php echo e($user->role->name); ?></td>
                                <td><?php echo e($user->balance); ?> AZN</td>
                                <td><?php echo e($user->debt); ?> AZN</td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
                <?php echo e($this->users->links()); ?>

            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="flex gap-4 items-start">
        <div class="flex-1 grid gap-4">
            <div class="my-container">
                <div class="flex items-center gap-1.5">
                    <div class="my-label">Müştəri</div>
                    <input type="text" class="my-input flex-1" disabled
                           value="<?php echo e($customer["data"]["name"] ?? "Seçilməmişdir"); ?>">
                    <button wire:click="$toggle('customer.state')" class="my-input font-medium">Seçin</button>
                </div>
            </div>
            <!--[if BLOCK]><![endif]--><?php if(!is_null($customer["id"])): ?>
                <div class="my-container grid gap-4">
                    <h1 class="text-xl font-bold">Müştəri məlumatları</h1>
                    <div class="flex items-center gap-1.5">
                        <div class="my-label">İstifadəçi kodu</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($customer["data"]->pid()); ?>">
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="my-label">Ad və soyad</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($customer["data"]->name); ?>">
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="my-label">Əlaqə nömrəsi</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($customer["data"]->phone()); ?>">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center gap-1.5">
                            <div class="my-label">Balans</div>
                            <input type="text" class="my-input flex-1" disabled value="<?php echo e($customer["data"]->balance); ?>">
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="my-label">Borc</div>
                            <input type="text" class="my-input flex-1" disabled value="<?php echo e($customer["data"]->debt); ?>">
                        </div>
                    </div>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <div class="grid gap-4">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div wire:key="<?php echo e($index); ?>" class="my-container grid gap-4">
                        <div class="flex items-center gap-1.5">
                            <div class="my-label">Məhsul</div>
                            <select class="my-input flex-1" wire:model.live="orderItems.<?php echo e($index); ?>.productId"
                                    wire:change="selectedProduct(<?php echo e($index); ?>)">
                                <option value="">Seçin</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                        </div>
                        <div class="flex items-start gap-1.5">
                            <div class="my-label">Qeyd</div>
                            <textarea name="" class="my-input flex-1" rows="3"
                                      disabled><?php echo e($orderItem["note"]); ?></textarea>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="flex items-center gap-1.5">
                                <div class="my-label">Miqdar</div>
                                <input type="number" step="0.01" class="my-input flex-1" wire:blur="calculate"
                                       wire:model.live="orderItems.<?php echo e($index); ?>.amount">
                            </div>
                            <div class="flex items-center gap-1.5">
                                <div class="my-label">Qiymət</div>
                                <input type="number" step="0.01" class="my-input flex-1"
                                       wire:model.live="orderItems.<?php echo e($index); ?>.price" wire:blur="calculate">
                            </div>
                            <div class="flex items-center gap-1.5">
                                <div class="my-label">Cəm</div>
                                <input type="text" class="my-input flex-1" disabled
                                       wire:model.live="orderItems.<?php echo e($index); ?>.total">
                            </div>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button wire:click="addOrderItem"
                                    class="my-input !p-2 5 text-sm font-medium inline-flex items-center gap-1.5 hover:text-blue-700">
                                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Əlavə et
                            </button>
                            <!--[if BLOCK]><![endif]--><?php if(count($orderItems) > 1): ?>
                                <button wire:click="removeOrderItem('<?php echo e($index); ?>')"
                                        class="my-input !p-2 5 text-sm font-medium inline-flex items-center gap-1.5 hover:text-orange-600">
                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Sil
                                </button>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
        <div class="my-container w-80 sticky top-4 grid gap-4">

            <div class="grid gap-1">
                <div class="my-label">Cəm</div>
                <input type="text" class="my-input" disabled wire:model.live="summary.total">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Endirim</div>
                <input type="text" class="my-input" wire:model.live="summary.discount" wire:blur="calculate">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Yekun məbləğ</div>
                <input type="text" class="my-input" disabled wire:model.live="summary.subTotal">
            </div>

            <div class="grid gap-1">
                <div class="my-label">Ödənilən məbləğ</div>
                <input type="number" step="0.01" class="my-input" wire:model.live="summary.paid" wire:blur="calculate">
            </div>

            <div class="grid gap-1">
                <div class="my-label">Borc</div>
                <input type="text" class="my-input" disabled wire:model.live="summary.debt">
                <!--[if BLOCK]><![endif]--><?php if($summary["debt"] < 0): ?>
                    <label for="add-to-balance" class="text-sm ml-auto mt-2 cursor-pointer">
                        <input type="checkbox" value="1" id="add-to-balance" wire:model.live="summary.addToBalance">
                        <span>Balansa əlavə et</span>
                    </label>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="grid gap-1">
                <div class="my-label">Qeyd</div>
                <textarea class="my-input" rows="3" wire:model="summary.note"></textarea>
            </div>
            <button
                class="my-input inline-flex items-center gap-1.5 font-medium text-sm transition hover:text-green-600"
                wire:loading.class="hidden"
                wire:click="save"
            >
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <span class="text-center flex-1">
                    Qəbul et
                </span>
            </button>
            <p wire:loading class="text-sm font-semibold animate-pulse">Sorğunuz icra olunur...</p>

        </div>
    </div>


</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/order/create.blade.php ENDPATH**/ ?>