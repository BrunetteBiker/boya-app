<div class="flex items-start gap-4">
    <div class="grid gap-4 flex-1">
        <div class="my-container grid gap-4">
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Müştəri</div>
                <div class="relative flex-1 grid">
                    <input type="text" class="border border-black p-3" placeholder="Seçin">
                    <select name="" id="" class="absolute bg-white w-full left-0 top-full mt-2 border border-black p-3">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                <button class="border border-black p-3 self-stretch">Yeni müştəri</button>
            </div>

        </div>
        <div class="my-container grid gap-4">
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Məhsul</div>
                <select name="" id="" class="border border-black p-3 flex-1">
                    <option value="">Seçin</option>
                </select>
                <a href="<?php echo e(url('product/dashboard?create-product')); ?>"
                   class="border border-blue-600 text-blue-600 self-stretch p-3 inline-flex items-center">Yeni
                    məhsul</a>
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Qiymət</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Miqdar</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Tərkib</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex gap-3 justify-end">
                <button class="border leading-none p-3 px-4 border-black text-blue-600 font-medium text-sm">Əlavə et
                </button>
                <button class="border leading-none p-3 px-4 border-black text-red-600 font-medium text-sm">Sil</button>
            </div>
        </div>
        <div class="my-container grid gap-4">
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Məhsul</div>
                <select name="" id="" class="border border-black p-3 flex-1">
                    <option value="">Seçin</option>
                </select>
                <a href="" class="border border-blue-600 text-blue-600 self-stretch p-3 inline-flex items-center">Yeni
                    məhsul</a>
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Qiymət</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Miqdar</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Tərkib</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex gap-3 justify-end">
                <button class="border leading-none p-3 px-4 border-black text-blue-600 font-medium text-sm">Əlavə et
                </button>
                <button class="border leading-none p-3 px-4 border-black text-red-600 font-medium text-sm">Sil</button>
            </div>
        </div>
        <div class="my-container grid gap-4">
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Məhsul</div>
                <select name="" id="" class="border border-black p-3 flex-1">
                    <option value="">Seçin</option>
                </select>
                <a href="" class="border border-blue-600 text-blue-600 self-stretch p-3 inline-flex items-center">Yeni
                    məhsul</a>
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Qiymət</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Miqdar</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Tərkib</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex gap-3 justify-end">
                <button class="border leading-none p-3 px-4 border-black text-blue-600 font-medium text-sm">Əlavə et
                </button>
                <button class="border leading-none p-3 px-4 border-black text-red-600 font-medium text-sm">Sil</button>
            </div>
        </div>
        <div class="my-container grid gap-4">
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Məhsul</div>
                <select name="" id="" class="border border-black p-3 flex-1">
                    <option value="">Seçin</option>
                </select>
                <a href="" class="border border-blue-600 text-blue-600 self-stretch p-3 inline-flex items-center">Yeni
                    məhsul</a>
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Qiymət</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Miqdar</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Tərkib</div>
                <input type="text" class="border border-black p-3 flex-1">
            </div>
            <div class="flex gap-3 justify-end">
                <button class="border leading-none p-3 px-4 border-black text-blue-600 font-medium text-sm">Əlavə et
                </button>
                <button class="border leading-none p-3 px-4 border-black text-red-600 font-medium text-sm">Sil</button>
            </div>
        </div>
    </div>
    <div class="my-container grid gap-4 w-80 sticky top-4">
        <div class="grid gap-1">
            <div class="text-sm font-medium">Çeşid sayı</div>
            <input type="text" class="border border-black p-3" disabled>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Cəm</div>
            <input type="text" class="border border-black p-3" disabled>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Endirim</div>
            <input type="text" class="border border-black p-3">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Yekun</div>
            <input type="text" class="border border-black p-3">
        </div>

        <button class="bg-green-700 text-white p-4 font-medium">Təsdiqlə</button>
    </div>

</div>
<?php /**PATH C:\laragon\www\boya\resources\views/livewire/order/create.blade.php ENDPATH**/ ?>