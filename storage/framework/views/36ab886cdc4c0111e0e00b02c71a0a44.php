<div class="grid gap-4">
    <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.generalInfo')}">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">Ümumi məlumatlar</h1>
            <button wire:click="$toggle('state.generalInfo')">
                <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div x-transition x-show="state" class="grid gap-4">
            <hr class="border-2 border-black">
            <div class="grid gap-4">
                <div class="flex gap-4">
                    <div class="flex items-center gap-2 flex-1">
                        <div class="my-label">Sifariş kodu</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->pid()); ?>">
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="my-label">Status</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->status->name); ?>">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="flex items-center gap-2">
                        <div class="my-label">Cəm</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->total); ?> AZN">
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="my-label">Endirim</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->discount); ?> AZN">
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="my-label">Yekun məbləğ</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->amount); ?> AZN">
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="my-label">Ödənilən məbləğ</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->paid); ?> AZN">
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="my-label">Borc</div>
                        <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->debt); ?> AZN">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.customerInfo')}">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">Müştəri məlumatları</h1>
            <button wire:click="$toggle('state.customerInfo')">
                <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div x-transition x-show="state" class="grid gap-4">
            <div class="flex gap-4">
                <div class="flex items-center gap-2">
                    <div class="my-label">Müştəri kodu</div>
                    <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->customer->pid()); ?>">
                </div>
                <div class="flex items-center gap-2 flex-1">
                    <div class="my-label">Ad və soyad</div>
                    <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->customer->name); ?>">
                </div>
            </div>
            <div class="flex items-start gap-2">
                <div class="my-label">Əlaqə nömrəsi</div>
                <textarea rows="3" class="my-input flex-1"
                          disabled><?php echo e($order->customer->phones->pluck("item")->implode(",")); ?></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center gap-2">
                    <div class="my-label">Balans</div>
                    <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->customer->balance); ?> AZN">
                </div>
                <div class="flex items-center gap-2">
                    <div class="my-label">Ümumi borc</div>
                    <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->customer->debt); ?> AZN">
                </div>
            </div>

        </div>
    </div>

    <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.payments')}">
        <div class=" flex justify-between items-center">
            <h1 class="text-xl font-bold">Ödənişlər</h1>
            <button wire:click="$toggle('state.payments')">
                <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div x-transition x-show="state" class="grid gap-4">
            <hr class="border-2 border-black">
            <div class="flex gap-4 items-start">
                <div class="my-container flex-1">
                    <table class="my-table">
                        <thead>
                        <th>Əməliyyatlar</th>
                        <th>Ödəniş kodu</th>
                        <th>Məbləğ</th>
                        <th>Qəbul edən</th>
                        <th>Ödəniş tarixi</th>
                        </thead>
                        <tbody>
                        <!--[if BLOCK]><![endif]--><?php if($this->payments->isNotEmpty()): ?>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="" class="my-input inline-flex items-center gap-1.5 text-sm !p-2.5">Qəbz
                                            çap et</a>
                                    </td>
                                    <td><?php echo e($payment->pid()); ?></td>
                                    <td><?php echo e($payment->amount); ?> AZN</td>
                                    <td><?php echo e($payment->executor->name); ?></td>
                                    <td><?php echo e($payment->created_at->format("d-m-Y h:i:s")); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center font-semibold text-xl">
                                    Ödəniş tapılmadı
                                </td>
                            </tr>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
                <!--[if BLOCK]><![endif]--><?php if($order->debt > 0): ?>
                    <div class="my-container w-80">
                        <form action="" class="grid gap-4">
                            <div class="grid gap-1">
                                <div class="my-label">Qəbul edən</div>
                                <input type="text" class="my-input" value="<?php echo e(auth()->user()->name); ?>" disabled>
                                <!--[if BLOCK]><![endif]--><?php if($order->customer->balance > 0 && !$paymentInfo["addBalance"]): ?>
                                    <label for="pay-from-balance" class="text-sm mt-1 ml-auto cursor-pointer">
                                        <input type="checkbox" id="pay-from-balance" value="1"
                                               wire:model.live="paymentInfo.fromBalance"
                                               wire:change="set('paymentInfo.addBalance',false)">
                                        <span>Balansdan ödə</span>
                                    </label>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                            <div class="grid gap-1">
                                <div class="my-label">Ödəniş miqdarı</div>
                                <input type="number" step="0.01" class="my-input" wire:model="paymentInfo.amount"
                                       wire:blur="calculate">
                            </div>
                            <div class="grid gap-1">
                                <div class="my-label">Qalıq</div>
                                <input type="text" class="my-input" disabled wire:model.live="paymentInfo.debt">
                                <!--[if BLOCK]><![endif]--><?php if($paymentInfo["debt"] > 0 && !$paymentInfo["fromBalance"]): ?>
                                    <label for="add-balance" class="mt-1 ml-auto text-sm cursor-pointer">
                                        <input type="checkbox" id="add-balance" value="1"
                                               wire:model="paymentInfo.addBalance"
                                               wire:change="$set('paymentInfo.fromBalance',false)">
                                        <span>Balansa köçür</span>
                                    </label>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                            <div class="grid gap-1">
                                <div class="my-label">Qeyd</div>
                                <textarea class="my-input" rows="3" wire:model="paymentInfo.note"></textarea>
                            </div>

                            <button wire:loading.class="hidden" type="button" wire:click="acceptPayment"
                                    class="my-input !p-3.5 font-medium inline-flex items-center gap-1.5 transition hover:text-green-600">
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                <span class="text-center flex-1">Mədaxil et</span>
                            </button>
                            <p wire:loading wire:target="acceptPayment" class="text-sm font-semibold animate-pulse">
                                Sorğunuz
                                icra olunur...</p>

                        </form>

                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>

    <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.orderItems')}">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">Məhsullar</h1>
            <button wire:click="$toggle('state.orderItems')">
                <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div x-transition x-show="state" class="grid gap-4">
            <hr class="border-2 border-black">
            <div class="my-container">
                <table class="my-table">
                    <thead>
                    <th>Məhsul</th>
                    <th>Miqdar</th>
                    <th>Qiymət</th>
                    <th>Cəm</th>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($orderItem->product->name); ?></td>
                            <td><?php echo e($orderItem->amount); ?> ədəd</td>
                            <td><?php echo e($orderItem->price); ?> AZN</td>
                            <td><?php echo e($orderItem->total); ?> AZN</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.updateRecords')}">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">Fəaliyyət tarixçəsi</h1>
            <button wire:click="$toggle('state.updateRecords')">
                <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div x-transition x-show="state" class="grid gap-4">
            <hr class="border-2 border-black">
            <div class="flex gap-4 items-start">
                <select class="my-input !p-2.5" wire:model.live="updateLogData.orderBy">
                    <option value="id|desc">Öncə yenilər</option>
                    <option value="id|asc">Öncə köhnələr</option>
                </select>
                <input type="text" class="my-input !p-2.5" placeholder="Axtarış..."
                       wire:model.live="updateLogData.keyword">
            </div>
            <div class="my-container overflow-auto max-h-96 grid">
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
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/order/details.blade.php ENDPATH**/ ?>