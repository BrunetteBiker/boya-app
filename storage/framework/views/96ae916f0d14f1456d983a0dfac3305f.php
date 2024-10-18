<div class="flex items-start gap-4">
    <div class="w-80 grid gap-4">
        <a href="<?php echo e(url("order/create?customer=".$user->id)); ?>" wire:navigate class="my-input bg-white font-semibold inline-flex items-center gap-2">
            <svg class="size-7"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-center flex-1">
            Yeni sifariş
            </span>
        </a>

        <div class="my-container grid gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">Şəxsi məlumatlar</h1>
            </div>
            <hr class="border-2 border-black">
            <div class="grid gap-1">
                <div class="my-label">İstifədçi kodu</div>
                <input type="text" class="my-input w-full" disabled value="<?php echo e($user->pid()); ?>">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Qeydiyyat tarixi</div>
                <input type="text" class="my-input w-full" disabled value="<?php echo e($user->created_at->format("d-m-Y h:i")); ?>">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ad və soyad</div>
                <input type="text" class="my-input w-full" wire:model="personalData.name">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Əlaqə nömrəsi</div>
                <div class="grid gap-2.5">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $personalData["phones"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex gap-1">
                            <input type="text" class="my-input w-full text-sm" x-mask="099-999-99-99"
                                   placeholder="012-234-56-78" wire:model="personalData.phones.<?php echo e($index); ?>">
                            <button wire:click="addPhone">
                                <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                            <!--[if BLOCK]><![endif]--><?php if(count($personalData["phones"]) > 1): ?>
                                <button wire:click="removePhone(<?php echo e($index); ?>)">
                                    <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <button wire:click="updateUser" class="my-input font-medium">Düzəliş et</button>
        </div>
    </div>
    <div class="flex-1 grid gap-4">

        <div class="flex flex-wrap gap-4">
            <div class="my-container  min-w-44">
                <h1 class="text-2xl text-right font-semibold"><?php echo e($user->balance); ?> AZN</h1>
                <p class="text-sm">Balans</p>
            </div>
            <div class="my-container min-w-44">
                <h1 class="text-2xl text-right font-semibold"><?php echo e($user->debt); ?> AZN</h1>
                <p class="text-sm">Ümumi borc</p>
            </div>
            <div class="my-container min-w-44">
                <h1 class="text-2xl text-right font-semibold"><?php echo e($user->old_debt); ?> AZN</h1>
                <p class="text-sm">Öncəki borc</p>
            </div>
            <div class="my-container min-w-44">
                <h1 class="text-2xl text-right font-semibold"><?php echo e($user->current_debt); ?> AZN</h1>
                <p class="text-sm">Faktiki borc</p>
            </div>
            <div class="my-container min-w-44">
                <h1 class="text-2xl text-right font-semibold"><?php echo e($user->remnant); ?> AZN</h1>
                <p class="text-sm">Alış borcu</p>
            </div>
        </div>

        <div class="my-container grid gap-4">
            <div class="flex gap-4">
                <div class="grid gap-1 flex-1">
                    <div class="my-label">Təsnifat</div>
                    <select class="my-input w-full" wire:model="paymentData.type">
                        <option value="">Seçin</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\PaymentType::where("is_manual",true)->orderBy("name","asc")->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($paymentType->id); ?>"><?php echo e($paymentType->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Əməliyyat növü</div>
                    <select class="my-input" wire:model=paymentData.action>
                        <option value="">Seçin</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\Action::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($action->id); ?>"><?php echo e($action->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Məbləğ</div>
                    <input type="number" step="0.01" class="my-input w-full" wire:model="paymentData.amount">
                </div>
            </div>

            <div class="grid gap-1">
                <div class="my-label">Qeyd</div>
                <textarea rows="3" class="my-input w-full" wire:model="paymentData.note"></textarea>
            </div>
            <button wire:loading.class="hidden" wire:click="acceptPayment" class="my-input font-medium ml-auto">Mədaxil
                et
            </button>
            <p wire:loading wire:target="acceptPayment" class="ml-auto text-sm font-medium animate-pulse">Sorğunuz icra
                olunur...</p>
        </div>
        <div class="my-container grid gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">Ödənişlər</h1>
            </div>
            <hr class="border-2 border-black">
            <div class="grid overflow-auto max-h-96 whitespace-nowrap">
                <table class="my-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>Ödəniş kodu</th>
                    <th>Təsnifat</th>
                    <th>Əməliyyat</th>
                    <th>Məbləğ</th>
                    <th>Tarix</th>
                    <th>Qeyd</th>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="inline-flex gap-2">
                                    <a href="" class="my-input inline-flex gap-1 items-center text-sm">Qəbz çap et</a>
                                    <button class="my-input inline-flex gap-1 items-center text-sm">Ləğv et</button>
                                </div>
                            </td>
                            <td><?php echo e($payment->pid()); ?></td>
                            <td><?php echo e($payment->type->name); ?></td>
                            <td><?php echo e($payment->action->name); ?></td>
                            <td><?php echo e($payment->amount); ?> AZN</td>
                            <td><?php echo e($payment->created_at->format("d-m-Y h:i:s")); ?></td>
                            <td class="whitespace-normal">
                                <p class="line-clamp-1 hover:line-clamp-none"><?php echo e($payment->note); ?></p>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
            <?php echo e($this->payments->links()); ?>

        </div>
        <div class="my-container grid gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">Tarixçə</h1>
            </div>
            <hr class="border-2 border-black">
            <div class="grid overflow-auto max-h-96 whitespace-nowrap">
                <table class="my-table">
                    <thead>
                    <th>Fəaliyyət</th>
                    <th>Tarix</th>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->updateLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $updateLog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($updateLog->note); ?></td>
                            <td><?php echo e($updateLog->created_at->format("d-m-Y h:i:s")); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
            <?php echo e($this->updateLogs->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/user/details.blade.php ENDPATH**/ ?>