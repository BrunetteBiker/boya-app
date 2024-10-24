<div x-data="{state : $wire.entangle('state')}" x-show="state"
     x-transition
     class="fixed top-0 left-0 h-dvh w-1/5 bg-white border-r-2 border-zinc-400 p-4 grid gap-3 content-start overflow-auto z-10"
     @click.outside="state = false">
    <div class="flex justify-between items-center text-blue-700">
        <h1 class="text-3xl font-bold ">Ödəniş məlumatları</h1>
        <button wire:click="$dispatch('payment.details.changeState')">
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </button>
    </div>
    <hr class="border-2 border-zinc-100">
    <!--[if BLOCK]><![endif]--><?php if(!is_null($payment)): ?>
        <div class="grid gap-1">
            <div class="my-label">Ödəniş kodu</div>
            <input type="text" class="input w-full" disabled value="<?php echo e($payment->pid ?? ""); ?>">
        </div>
        <div class="grid gap-1">
            <div class="my-label">Qeyd</div>
            <textarea name="" class="input w-full" rows="3" disabled><?php echo e($payment->note); ?></textarea>
        </div>
        <div class="grid gap-1">
            <div class="my-label">Tarix</div>
            <input type="text" class="input w-full" disabled
                   value="<?php echo e($payment->created_at->format("d-m-Y h:i:s") ?? ""); ?>">
        </div>
        <div class="grid gap-1">
            <div class="my-label">İcraçı</div>
            <input type="text" class="input w-full" disabled value="<?php echo e($payment->executor->name ?? ""); ?>">
        </div>
        <div class="grid gap-1">
            <div class="my-label">Müştəri</div>
            <input type="text" class="input w-full" disabled value="<?php echo e($payment->customer->name ?? ""); ?>">
        </div>
        <div class="grid gap-1">
            <div class="my-label">Məbləğ</div>
            <input type="text" class="input w-full" disabled value="<?php echo e($payment->amount . " AZN" ?? ""); ?>">
        </div>
        <div class="grid gap-1">
            <div class="my-label">Təsnifat</div>
            <input type="text" class="input w-full" disabled value="<?php echo e($payment->type->name); ?>">
        </div>
        <div class="grid gap-1">
            <div class="my-label">Əməliyyat</div>
            <input type="text" class="input w-full" disabled value="<?php echo e($payment->action->name); ?>">
        </div>

        <!--[if BLOCK]><![endif]--><?php if($payment->type_id == 4 && $payment->is_cancelled == false): ?>
            <div class="grid gap-1">
                <div class="my-label">Ləğv səbəbi</div>
                <textarea class="input w-full" rows="3" wire:model="explanation"></textarea>
            </div>
            <button
                wire:loading.class="hidden"
                class="input w-full !border-red-500 bg-red-100 font-medium text-red-700 inline-flex gap-1.5 items-center justify-center"
                wire:click="cancel"
            >
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                Ləğv et
            </button>
            <p wire:loading wire:target="cancel" class="text-sm font-semibold animate-pulse">Sorğunuz icra olunur...</p>

        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($payment->is_cancelled): ?>
            <div class="grid gap-1">
                <div class="my-label">Ləğv edən</div>
                <input type="text" class="input w-full" disabled value="<?php echo e($payment->cancelledUser->name); ?>">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ləğv tarixi</div>
                <input type="text" class="input w-full" disabled
                       value="<?php echo e($payment->updated_at->format("d-m-Y h:i:s")); ?>">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Səbəb</div>
                <textarea name="" class="input w-full" rows="3" disabled><?php echo e($payment->explanation); ?></textarea>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <a href="<?php echo e(url("payment/print/$payment->id")); ?>"
           class="btn btn-outline btn-outline-primary btn-large justify-center">
            <svg class="size-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"/>
                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"/>
                <rect x="7" y="13" width="10" height="8" rx="2"/>
            </svg>
            Qəbz çap et
        </a>

    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/payment/details.blade.php ENDPATH**/ ?>