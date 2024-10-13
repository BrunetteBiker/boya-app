<div class="flex items-start gap-4">

    <!--[if BLOCK]><![endif]--><?php if($customerSection): ?>
        <div class="fixed top-0 left-0 w-full h-dvh bg-black/50 backdrop-blur p-8 z-20">
            <div class="my-container grid gap-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-5xl font-bold mb-2">Müştərilər</h1>
                    <button class="underline" wire:click="$toggle('customerSection')">Geri qayıt</button>
                </div>
                <div class="flex gap-3">
                    <input type="text" class="border border-black p-3 outline-0 min-w-96" placeholder="Axtarış">
                    <a href="" class="border border-black p-3 font-medium">İstifadəçi yarat</a>
                </div>

                <hr class="border-2 border-black">
                <div class="">
                    <table class="my-table">
                        <thead>
                        <th>Əməliyyatlar</th>
                        <th>İstifadəçi kodu</th>
                        <th>Ad və soyad</th>
                        <th>Əlaqə nömrəsi</th>
                        <th>Borc</th>
                        <th>Balans</th>
                        </thead>
                        <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <label :key="customer-<?php echo e($customer->id); ?>" for="customer-<?php echo e($customer->id); ?>"
                                           class="border border-black p-2 text-sm inline-flex items-center gap-1.5">
                                        <input type="radio" value="<?php echo e($customer->id); ?>" id="customer-<?php echo e($customer->id); ?>"
                                               wire:model.live="customerId">
                                        <span>Seç</span>
                                    </label>

                                    <?php echo e($customerId); ?>

                                </td>
                                <td><?php echo e($customer->pid()); ?></td>
                                <td><?php echo e($customer->name); ?></td>
                                <td>
                                    <p class="line-clamp-1 hover:line-clamp-none">
                                        <?php echo e($customer->phones->pluck("item")->implode(",")); ?>

                                    </p>
                                </td>
                                <td><?php echo e($customer->debt); ?> AZN</td>
                                <td><?php echo e($customer->balance); ?> AZN</td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
                <?php echo e($this->customers->links()); ?>

            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="grid gap-4 flex-1">
        <div class="my-container grid gap-4">
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Müştəri</div>
                <div class="relative flex-1 grid">
                    <input type="text" class="border border-black p-3" placeholder="Seçin"
                           wire:click="$toggle('customerSection')" wire:model="customer">
                </div>
            </div>

        </div>
        <!--[if BLOCK]><![endif]--><?php if(!is_null($customerId)): ?>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="my-container grid gap-4">
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Məhsul</div>
                        <select class="border border-black p-3 flex-1" wire:model.live="orderItems.<?php echo e($index); ?>.productId"
                                wire:change="productInfo('<?php echo e($index); ?>')">
                            <option value="">Seçin</option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                        <a href="<?php echo e(url('product/dashboard?create-product')); ?>"
                           class="border border-blue-600 text-blue-600 self-stretch p-3 inline-flex items-center">Yeni
                            məhsul</a>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Qiymət</div>
                        <input type="text" class="border border-black p-3 flex-1"
                               placeholder="<?php echo e($orderItem["recommendedInterval"]); ?>"
                               wire:model="orderItems.<?php echo e($index); ?>.price"
                               wire:keyup="calculate" <?php echo e(is_null($orderItem["productId"]) ? "disabled" : ""); ?>>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Miqdar</div>
                        <input type="text" class="border border-black p-3 flex-1"
                               wire:model="orderItems.<?php echo e($index); ?>.amount"
                               wire:keyup="calculate" <?php echo e(is_null($orderItem["productId"]) ? "disabled" : ""); ?>>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Cəm</div>
                        <input type="text" class="border border-black p-3 flex-1"
                               wire:model.live="orderItems.<?php echo e($index); ?>.total" disabled>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Tərkib</div>
                        <input type="text" class="border border-black p-3 flex-1"
                               wire:model="orderItems.<?php echo e($index); ?>.receipt" <?php echo e(is_null($orderItem["productId"]) ? "disabled" : ""); ?>>
                    </div>
                    <div class="flex gap-3 justify-end">
                        <button wire:click="addOrderItem"
                                class="border leading-none p-3 px-4 border-black text-blue-600 font-medium text-sm">
                            Əlavə et
                        </button>
                        <button wire:click="removeOrderItem('<?php echo e($index); ?>')"
                                class="border leading-none p-3 px-4 border-black text-red-600 font-medium text-sm">Sil
                        </button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="my-container grid gap-4 w-80 sticky top-4">
        <!--[if BLOCK]><![endif]--><?php if(!is_null($customerId)): ?>
            <div class="grid gap-1">
                <div class="text-sm font-medium">Çeşid sayı</div>
                <input type="text" class="border border-black p-3" disabled value="<?php echo e(count($orderItems)); ?> ədəd">
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <div class="grid gap-1">
            <div class="text-sm font-medium">Cəm</div>
            <input type="text" class="border border-black p-3" disabled value="<?php echo e($subTotal); ?> AZN">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Endirim</div>
            <input type="text" class="border border-black p-3" wire:model="discount" wire:keyup="calculate">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Yekun</div>
            <input type="text" class="border border-black p-3" disabled value="<?php echo e($final); ?> AZN">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Ödənilən</div>
            <input type="text" class="border border-black p-3" wire:model="paid" wire:keyup="calculate">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Borc</div>
            <input type="text" class="border border-black p-3" disabled value="<?php echo e($debt); ?> AZN">
            <!--[if BLOCK]><![endif]--><?php if($debt < 0): ?>
                <label for="add-to-balance" class="ml-auto text-sm inline-flex gap-1 items-center mt-2">
                    <input type="checkbox" id="add-to-balance" wire:model="addToBalance" value="1">
                    <span>Balansa köçür</span>
                </label>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Qeyd</div>
            <textarea class="border border-black p-3" rows="3" wire:model="notes"></textarea>
        </div>


        <button wire:click="save" class="bg-green-700 text-white p-4 font-medium">Təsdiqlə</button>
    </div>

</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/order/create.blade.php ENDPATH**/ ?>