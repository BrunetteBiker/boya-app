<div x-data="{state : $wire.entangle('state')}" x-transition x-show="state" class="fixed w-full top-0 left-0 h-dvh bg-black/70 backdrop-blur z-20 grid p-8 items-start justify-items-center">
    <div class="my-container w-1/3 grid gap-3">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Ödənişin ləğvi</h1>
            <button wire:click="$set('state',false)">
                <svg class="size-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </button>
        </div>
        <hr class="border border-black">
        <div class="flex items-center gap-1.5">
            <div class="my-label">Ödəniş kodu</div>
            <input type="text" class="my-input flex-1" disabled wire:model="pid">
        </div>
        <div class="flex items-center gap-1.5">
            <div class="my-label">Ləğv edən</div>
            <input type="text" class="my-input flex-1" disabled value="<?php echo e(auth()->user()->name); ?>">
        </div>
        <div class="grid gap-1.5">
            <div class="my-label">Səbəb</div>
            <textarea class="my-input" rows="3" wire:model="explanation"></textarea>
        </div>
        <button wire:loading.class="hidden" wire:click="save" class="my-input font-semibold" wire:confirm="Bu əməliyyatı etməyə əminsiniz mi?">Təsdiqlə</button>
        <p wire:loading wire:target="save" class="text-sm font-semibold animate-pulse">Sorğunuz icra olunur...</p>
    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/payment/cancel.blade.php ENDPATH**/ ?>