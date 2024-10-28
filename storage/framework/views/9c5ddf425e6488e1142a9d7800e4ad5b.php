<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    "index",
    "orderItems",
    "orderItem",
    "receipts"
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    "index",
    "orderItems",
    "orderItem",
    "receipts"
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<div wire:key="<?php echo e($index); ?>" class="my-container grid gap-4">
    <div class="flex items-center gap-1.5">
        <div class="my-label">Məhsul</div>
        <select class="input flex-1" wire:model.live="orderItems.<?php echo e($index); ?>.productId"
                wire:change="selectedProduct(<?php echo e($index); ?>)">
            <option value="">Seçin</option>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </select>
        <button wire:click="$dispatch('product.create')" class="btn btn-outline btn-outline-primary inline-flex items-center gap-1.5">
            <svg class="size-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Yeni məhsul
        </button>
    </div>
    <!--[if BLOCK]><![endif]--><?php if($orderItems[$index]["productId"] != ""): ?>
        <div class="flex items-center gap-1.5">
            <div class="my-label">Tərkib</div>
            <div class="relative grid flex-1">
                <input type="text" class="input" wire:model="orderItems.<?php echo e($index); ?>.receipt"
                       wire:click.outside="$set(receipts.<?php echo e($index); ?> , [] )"
                       wire:keyup="searchReceipts($event.target.value , <?php echo e($index); ?> )">
                <div
                    class="input absolute w-full top-full mt-2 bg-white flex flex-wrap gap-2 <?php echo e(count($receipts[$index]) > 0 ? "" : "hidden"); ?>">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $receipts[$index]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label for="<?php echo e($index); ?>-<?php echo e($i); ?>-<?php echo e($receipt); ?>"
                               class="input inline-flex items-center gap-1.5 !p-2.5 text-sm cursor-pointer">
                            <input type="radio" id="<?php echo e($index); ?>-<?php echo e($i); ?>-<?php echo e($receipt); ?>"
                                   wire:model="orderItems.<?php echo e($index); ?>.receipt" value="<?php echo e($receipt); ?>"
                                   wire:click="$set('receipts.<?php echo e($index); ?>',[])">
                            <span><?php echo e($receipt); ?></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
        <div class="flex items-start gap-1.5">
            <div class="my-label">Qeyd</div>
            <textarea name="" class="input flex-1" rows="3"
                      disabled><?php echo e($orderItem["note"]); ?></textarea>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="flex items-center gap-1.5">
                <div class="my-label">Miqdar</div>
                <input type="number" step="0.01" class="input flex-1"
                       wire:model.blur="orderItems.<?php echo e($index); ?>.amount">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="my-label">Qiymət</div>
                <input type="number" step="0.01" class="input flex-1"
                       wire:model.blur="orderItems.<?php echo e($index); ?>.price">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="my-label">Cəm</div>
                <input type="text" class="input flex-1" disabled
                       wire:model.blur="orderItems.<?php echo e($index); ?>.total">
            </div>
        </div>
        <div class="flex justify-end gap-2">
            <button wire:click="addOrderItem"
                    class="btn btn-primary inline-flex items-center gap-1.5">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Əlavə et
            </button>
            <!--[if BLOCK]><![endif]--><?php if(count($orderItems) > 1): ?>
                <button wire:click="removeOrderItem('<?php echo e($index); ?>')"
                        class="btn btn-danger inline-flex items-center gap-1.5">
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Sil
                </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/components/order/create/select-product.blade.php ENDPATH**/ ?>