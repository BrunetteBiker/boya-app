<div x-data="{state : $wire.entangle('state')}"
     x-transition
     x-show="state"
    class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur grid justify-items-center content-start p-8 z-20">
    <div class="my-container grid gap-4 w-1/3" wire:click.outside="$set('state',false)">
        <div class="flex items-center justify-between gap-4 text-blue-700">
            <h1 class="text-3xl font-bold">Yeni məhsul blankı</h1>
            <button wire:click="$set('state',false)">
                <svg class="size-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </button>
        </div>
        <hr class="border-2 border-zinc-100">
        <div class="grid gap-1">
            <div class="my-label">Məhsulun adı</div>
            <input type="text" class="input" placeholder="Daxil edin"
                   wire:model="data.name">
        </div>
        <div class="grid gap-1">
            <div class="my-label">Qeyd</div>
            <textarea class="input" rows="3" wire:model="data.note" placeholder="Məhsul haqqında qeydlərinizi buraya qeyd edin..."></textarea>
        </div>
        <div class="grid gap-1">
            <div class="my-label">Status</div>
            <select class="input" wire:model="data.visible">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
        </div>
        <button wire:click="create"
                class="btn btn-primary inline-flex items-center gap-1.5">
            <svg class="size-6" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M14 3v4a1 1 0 0 0 1 1h4" />  <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />  <line x1="12" y1="11" x2="12" y2="17" />  <line x1="9" y1="14" x2="15" y2="14" /></svg>
            Yadda saxla
        </button>

    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/product/create.blade.php ENDPATH**/ ?>