<div class="grid gap-4">
    <div class="flex justify-end gap-4">
        <a href="<?php echo e(url("print/$order->id")); ?>"
           class="my-container inline-flex items-center gap-2 font-medium !p-2.5 text-sm">
            <svg class="size-7" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"/>
                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"/>
                <rect x="7" y="13" width="10" height="8" rx="2"/>
            </svg>
            Qaiməni çap et
        </a>
    </div>
    <div class="grid grid-cols-2 gap-4 items-start">
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
                    <ul class="grid gap-2">
                        <li>Sifariş kodu : <span class="font-semibold"><?php echo e($order->pid); ?></span></li>
                        <li>Qeydiyyat tarixi : <span
                                class="font-semibold"><?php echo e($order->created_at->format("d-m-Y h:i:s")); ?></span></li>
                        <li>Status : <span class="font-semibold"><?php echo e($order->status->name); ?></span></li>
                        <!--[if BLOCK]><![endif]--><?php if($order->status_id == 4): ?>
                            <li>Ləğv edən : <span class="font-semibold"><?php echo e($order->cancelledBy->name); ?></span></li>
                            <li>Ləğv səbəbi : <span class="font-semibold"><?php echo e($order->cancel_explanation); ?></span></li>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <li>Ümumi cəm : <span class="font-semibold"><?php echo e($order->amount); ?> AZN</span></li>
                        <li>Endirim : <span class="font-semibold"><?php echo e($order->discount); ?> AZN</span></li>
                        <li>Yekun : <span class="font-semibold"><?php echo e($order->total); ?> AZN</span></li>
                        <li>Ödənilib : <span class="font-semibold"><?php echo e($order->paid); ?> AZN</span></li>
                        <li>Borc : <span class="font-semibold"><?php echo e($order->debt); ?> AZN</span></li>
                        <li>İcraçı : <span class="font-semibold"><?php echo e($order->executor->name); ?></span></li>
                    </ul>
                </div>
            </div>
            <!--[if BLOCK]><![endif]--><?php if($order->status_id != 4): ?>
                <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.cancel')}">
                    <div class="flex justify-between items-center">
                        <h1 class="text-xl font-bold">Sifarişin ləğvi</h1>
                        <button wire:click="$toggle('state.cancel')">
                            <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </button>
                    </div>
                    <div x-transition x-show="state" class="grid gap-4">
                        <hr class="border-2 border-black">
                        <div class="grid gap-1">
                            <div class="my-label">Ləğv səbəbi</div>
                            <textarea class="my-input" rows="3"
                                      wire:model="cancelExplanation" <?php echo e($order->status_id == 4 ? "disabled" : ""); ?>></textarea>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($order->status_id != 4): ?>
                            <button wire:click="cancelOrder"
                                    class="my-input ml-auto font-semibold transition hover:text-red-600">Təsdiqlə
                            </button>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
                <hr class="border-2 border-black">
                <ul class="grid gap-2">
                    <li>Müştəri kodu : <span class="font-semibold"><?php echo e($order->customer->pid); ?></span></li>
                    <li>Ad və soyad : <span class="font-semibold"><?php echo e($order->customer->name); ?></span></li>
                    <li>Əlaqə nömrəsi : <span class="font-semibold"><?php echo e($order->customer->phone()); ?></span></li>
                    <li>Qeydiyyat tarixi : <span
                            class="font-semibold"><?php echo e($order->customer->created_at->format("d-m-Y")); ?></span></li>
                    <li>Vəzifə : <span class="font-semibold"><?php echo e($order->customer->role->name); ?></span></li>
                    <li>Balans : <span class="font-semibold"><?php echo e($order->customer->balance); ?> AZN</span></li>
                    <li>Ümumi borc : <span class="font-semibold"><?php echo e($order->customer->debt); ?> AZN</span></li>
                    <li>Satış borcu : <span class="font-semibold"><?php echo e($order->customer->current_debt); ?> AZN</span></li>
                    <li>Köhnə borc : <span class="font-semibold"><?php echo e($order->customer->old_debt); ?> AZN</span></li>
                </ul>
                <div class="flex gap-2 justify-self-start">
                    <a href="<?php echo e(url("user/details/$order->customer_id")); ?>" target="_blank"
                       class="my-input text-sm !p-2.5 transition hover:text-sky-600 hover:font-medium inline-flex items-center gap-1.5">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Ətraflı məlumat
                    </a>
                    <a href="<?php echo e(url("order/create?customer=$order->customer_id")); ?>" target="_blank"
                       class="my-input text-sm !p-2.5 transition hover:text-green-600 hover:font-medium inline-flex items-center gap-1.5">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Yeni sifariş
                    </a>
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
                <!--[if BLOCK]><![endif]--><?php if($order->debt > 0 && $order->status_id != 4): ?>
                    <div class="my-container w-80">
                        <form action="" class="grid gap-4">
                            <div class="grid gap-1">
                                <div class="my-label">Qəbul edən</div>
                                <input type="text" class="my-input" value="<?php echo e(auth()->user()->name); ?>" disabled>
                                <!--[if BLOCK]><![endif]--><?php if($order->customer->balance > 0): ?>
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

                            <!--[if BLOCK]><![endif]--><?php if(!$paymentInfo["fromBalance"] && $paymentInfo["reminder"] > 0): ?>
                                <div class="grid gap-1">
                                    <div class="my-label">Qalıq</div>
                                    <input type="text" class="my-input" disabled wire:model.live="paymentInfo.reminder">
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <div class="grid gap-1">
                                <div class="my-label">Cari borc</div>
                                <input type="text" class="my-input" disabled wire:model.live="paymentInfo.debt">
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
                    <th>Tərkib</th>
                    <th>Miqdar</th>
                    <th>Qiymət</th>
                    <th>Cəm</th>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($orderItem->product->name); ?></td>
                            <td><?php echo e($orderItem->receipt); ?></td>
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
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/order/details.blade.php ENDPATH**/ ?>