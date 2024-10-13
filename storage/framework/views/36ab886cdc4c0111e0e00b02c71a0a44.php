<div class="grid gap-4">
    <div class="grid grid-cols-2 gap-4 items-start">
        <div class="my-container grid gap-4">
            <div class="flex items-center gap-2">
                <div class="my-label">Sifariş kodu</div>
                <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->pid()); ?>">
            </div>
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
            <div class="flex items-center gap-2">
                <div class="my-label">Status</div>
                <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->status->name); ?>">
            </div>
        </div>
        <div class="my-container grid gap-4">
            <div class="flex items-center gap-2">
                <div class="my-label">Müştəri kodu</div>
                <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->customer->pid()); ?>">
            </div>
            <div class="flex items-center gap-2">
                <div class="my-label">Ad və soyad</div>
                <input type="text" class="my-input flex-1" disabled value="<?php echo e($order->customer->name); ?>">
            </div>
            <div class="flex items-start gap-2">
                <div class="my-label">Əlaqə nömrəsi</div>
                <textarea rows="3" class="my-input flex-1" disabled><?php echo e($order->customer->phones->pluck("item")->implode(",")); ?></textarea>
            </div>
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
    <div class="flex gap-4 items-start">
        <div class="my-container flex-1">
            <table class="my-table">
                <thead>
                    <th>Ödəniş kodu</th>
                    <th>Məbləğ</th>
                    <th>Qəbul edən</th>
                    <th>Ödəniş tarixi</th>
                </thead>
                <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($payment->pid()); ?></td>
                        <td><?php echo e($payment->amount); ?> AZN</td>
                        <td><?php echo e($payment->executor->name); ?></td>
                        <td><?php echo e($payment->created_at->format("d-m-Y h:i:s")); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
        <!--[if BLOCK]><![endif]--><?php if($order->debt > 0): ?>
            <div class="my-container w-80">

                <form action="" class="grid gap-4">
                    <div class="grid gap-1">
                        <div class="my-label">Qəbul edən</div>
                        <input type="text" class="my-input" value="<?php echo e(auth()->user()->name); ?>" disabled>
                    </div>
                    <!--[if BLOCK]><![endif]--><?php if($order->customer->balance > 0): ?>
                        <label for="pay-from-balance" class="my-input">
                            <input type="checkbox" id="pay-from-balance" value="1" wire:model.live="payFromBalance">
                            <span>Balansdan ödə</span>
                        </label>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <div class="grid gap-1">
                        <div class="my-label">Ödəniş miqdarı</div>
                        <input type="number" step="0.01" class="my-input" wire:model.live="paymentAmount">
                    </div>
                    <div class="grid gap-1">
                        <div class="my-label">Qalıq</div>
                        <input type="text" class="my-input" disabled wire:model.live="paymentRest">
                    </div>
                    <!--[if BLOCK]><![endif]--><?php if($paymentRest < 0 && $payFromBalance == false): ?>
                        <label for="increase-balance" class="my-input">
                            <input type="checkbox" id="increase-balance" value="1" wire:model="increaseBalance">
                            <span>Balansa köçür</span>
                        </label>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <button type="button" wire:click="incrementIncome" class="border border-black leading-none p-4 font-medium">Mədaxil et</button>
                </form>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

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
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/order/details.blade.php ENDPATH**/ ?>