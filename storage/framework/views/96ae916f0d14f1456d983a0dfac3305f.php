<div class="flex items-start gap-4">
    <div class="grid gap-4 w-80">
        <div class="my-container grid gap-3">
            <h1 class="text-2xl font-bold">Maliyyə əməliyyatları</h1>
            <div class="grid gap-1">
                <div class="my-label">Əməliyyat növü</div>
                <select class="my-input w-full" wire:model.live="financialData.type_id">
                    <option value="">Seçin</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\PaymentType::whereNot("id",1)->orderBy("name","asc")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!--[if BLOCK]><![endif]--><?php if($paymentType->id == 4): ?>
                            <!--[if BLOCK]><![endif]--><?php if($user->role_id == 3): ?>
                                <option value="<?php echo e($paymentType->id); ?>"><?php echo e($paymentType->name); ?></option>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <option value="<?php echo e($paymentType->id); ?>"><?php echo e($paymentType->name); ?></option>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Məbləğ</div>
                <div class="flex gap-3 items-center">
                    <input type="text" class="my-input w-full" wire:model="financialData.amount">
                    <!--[if BLOCK]><![endif]--><?php if($financialData["type_id"] == 4): ?>
                        <p><?php echo e($user->remnant_currency); ?></p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                </div>
            </div>
            <button wire:click="financialAction" class="border border-black text-sm leading-none font-medium p-4">
                Təsdiqlə
            </button>

            <p wire:loading class="text-sm font-medium animate-pulse">Sorğunuz icra olunur...</p>
        </div>
        <div class="my-container grid gap-2">
            <h1 class="text-2xl font-bold">Şəxsi məlumatlar</h1>
            <div class="grid gap-1">
                <div class="my-label">İstifadəçi kodu</div>
                <input type="text" class="my-input w-full" disabled value="<?php echo e($user->pid()); ?>">
            </div>
            <div class="grid gap-1">
                <div class="my-label">İstifadəçi kodu</div>
                <input type="text" class="my-input w-full" disabled
                       value="<?php echo e($user->created_at->format("d-m-Y h:i")); ?>">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ad və soyad</div>
                <input type="text" class="my-input w-full" wire:model="personalData.name">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Vəzifə</div>
                <select class="my-input w-full" wire:model="personalData.role_id">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\UserRole::orderBy("name","asc")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Əlaqə nömrəsi</div>
                <div class="grid gap-3">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $personalData["phones"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="grid gap-1.5">
                            <input type="text" class="my-input w-full" wire:model="personalData.phones.<?php echo e($index); ?>"
                                   x-mask="099-999-99-99">
                            <div class="inline-flex gap-3 text-xs justify-end">
                                <button wire:click="addPhone">Əlavə et</button>
                                <!--[if BLOCK]><![endif]--><?php if(count($personalData["phones"]) > 1): ?>
                                    <button wire:click="removePhone(<?php echo e($index); ?>)">Sil</button>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ümumi borc</div>
                <input type="text" class="my-input w-full" disabled value="<?php echo e($user->debt); ?> AZN">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Balans</div>
                <input type="text" class="my-input w-full" disabled value="<?php echo e($user->balance); ?> AZN">
            </div>
            <!--[if BLOCK]><![endif]--><?php if($user->role_id == 3): ?>
                <div class="grid gap-1">
                    <div class="my-label">Kəsir</div>
                    <div class="flex gap-2">
                        <input type="text" class="my-input w-full" wire:model="personalData.remnant">
                        <select class="my-input" wire:model="personalData.remnant_currency">
                            <option value="AZN">AZN</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <button wire:click="modifyUser" class="border border-black p-4 leading-none font-medium text-sm">Düzəliş
                et
            </button>

            <div wire:loading class="animate-pulse font-medium text-sm">Sorğunuz icra olunur...</div>
        </div>

    </div>
    <div class="grid gap-4 flex-1">
        <div class="flex flex-wrap gap-3">
            <div class="my-container grid gap-1 min-w-40">
                <div class="inline-flex gap-2">
                    <span class="text-xl justify-self-end font-bold"><?php echo e(\App\Models\Order::where(["customer_id"=>$user->id])->count()); ?> ədəd</span>
                    |
                    <span class="text-xl justify-self-end font-bold"><?php echo e(round(\App\Models\Order::where(["customer_id"=>$user->id])->sum("total"),2)); ?> AZN</span>
                </div>

                <span class="text-sm">Sifariş sayı</span>
            </div>
            <div class="my-container grid gap-1 min-w-40">
                <div class="inline-flex gap-2">
                    <span class="text-xl justify-self-end font-bold"><?php echo e(\App\Models\Order::where(["customer_id"=>$user->id,"status_id"=>1])->count()); ?> ədəd</span>
                    |
                    <span class="text-xl justify-self-end font-bold"><?php echo e(round(\App\Models\Order::where(["customer_id"=>$user->id,"status_id"=>1])->sum("total"),2)); ?> AZN</span>
                </div>
                <span class="text-sm">Qəbul edilib</span>
            </div>
            <div class="my-container grid gap-1 min-w-40">
                <div class="inline-flex gap-2">
                    <span class="text-xl justify-self-end font-bold"><?php echo e(\App\Models\Order::where(["customer_id"=>$user->id,"status_id"=>2])->count()); ?> ədəd</span>
                    |
                    <span class="text-xl justify-self-end font-bold"><?php echo e(round(\App\Models\Order::where(["customer_id"=>$user->id,"status_id"=>2])->sum("total"),2)); ?> AZN</span>
                </div>
                <span class="text-sm">Hazırdır</span>
            </div>
            <div class="my-container grid gap-1 min-w-40">
                <div class="inline-flex gap-2">
                    <span class="text-xl justify-self-end font-bold"><?php echo e(\App\Models\Order::where(["customer_id"=>$user->id,"status_id"=>3])->count()); ?> ədəd</span>
                    |
                    <span class="text-xl justify-self-end font-bold"><?php echo e(round(\App\Models\Order::where(["customer_id"=>$user->id,"status_id"=>3])->sum("total"),2)); ?> AZN</span>
                </div>
                <span class="text-sm">Təhvil verilib</span>
            </div>
            <div class="my-container grid gap-1 min-w-40">
                <div class="inline-flex gap-2">
                    <span class="text-xl justify-self-end font-bold"><?php echo e(\App\Models\Order::where(["customer_id"=>$user->id,"status_id"=>4])->count()); ?> ədəd</span>
                    |
                    <span class="text-xl justify-self-end font-bold"><?php echo e(round(\App\Models\Order::where(["customer_id"=>$user->id,"status_id"=>4])->sum("total"),2)); ?> AZN</span>
                </div>
                <span class="text-sm">Ləğv edilib</span>
            </div>
        </div>
        <div class="my-container">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Son sifarişlər</h1>
                <button class="border border-black p-1 rounded-full">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
            </div>

            <div class="overflow-auto grid">
                <table class="my-table">
                    <thead>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(url("order/details/$order->id")); ?>" wire:navigate
                                   class="border border-black p-3 leading-none underline inline-flex text-sm">Ətraflı
                                    məlumat</a>
                            </td>
                            <td><?php echo e($order->pid()); ?></td>
                            <td><?php echo e($order->final); ?> AZN</td>
                            <td><?php echo e($order->status->name); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="my-container">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Ödənişlər</h1>
                <button class="border border-black p-1 rounded-full">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
            </div>
            <!--[if BLOCK]><![endif]--><?php if($this->payments->isNotEmpty()): ?>
                <table class="my-table">
                    <thead></thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="">Qəbz</a>
                            </td>
                            <td><?php echo e($payment->pid()); ?></td>
                            <td><?php echo e($payment->amount); ?> AZN</td>
                            <td><?php echo e($payment->created_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            <?php else: ?>
                <div class="grid gap-3 mt-2">
                    <hr class="border-2 border-black">
                    <p class="text-3xl font-light text-center">Ödəniş yoxdur</p>
                </div>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="my-container grid gap-4" wire:click="$toggle('states.modifyLogs')">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Düzəliş tarixçəsi</h1>
                <button class="border border-black p-1 rounded-full">
                    <!--[if BLOCK]><![endif]--><?php if($states["modifyLogs"]): ?>
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="18 15 12 9 6 15"/>
                        </svg>
                    <?php else: ?>
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </button>
            </div>
            <!--[if BLOCK]><![endif]--><?php if($states["modifyLogs"]): ?>
                <div wire:transition class="grid gap-4">
                    <hr class="border-2 border-black">
                    <div class="overflow-auto grid">
                        <table class="my-table">
                            <tbody>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->modifyLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($log->note); ?></td>
                                    <td><?php echo e($log->created_at->format("d-m-Y h:i:s")); ?></td>
                                    <td><?php echo e($log->executor->name); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($this->modifyLogs->links()); ?>

                </div>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/user/details.blade.php ENDPATH**/ ?>