<div class="grid gap-4">
    <!--[if BLOCK]><![endif]--><?php if($selectedId): ?>
        <?php echo $__env->make("livewire.product.edit", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($newProduct["state"]): ?>
        <?php echo $__env->make("livewire.product.create", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="flex gap-4 items-start">
        <div class="grid gap-3 flex-1">
            <div class="flex flex-wrap gap-3">
                <div class="p-6 rounded-lg shadow-md bg-white flex gap-3 items-center">
                    <svg class="size-10 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 106.86 122.88"
                         style="enable-background:new 0 0 106.86 122.88" xml:space="preserve"><style
                            type="text/css">.st0 {
                                fill-rule: evenodd;
                                clip-rule: evenodd;
                            }</style>
                        <g>
                            <path class="st0"
                                  d="M39.62,64.58c-1.46,0-2.64-1.41-2.64-3.14c0-1.74,1.18-3.14,2.64-3.14h34.89c1.46,0,2.64,1.41,2.64,3.14 c0,1.74-1.18,3.14-2.64,3.14H39.62L39.62,64.58z M46.77,116.58c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15H7.33 c-2.02,0-3.85-0.82-5.18-2.15C0.82,119.4,0,117.57,0,115.55V7.33c0-2.02,0.82-3.85,2.15-5.18C3.48,0.82,5.31,0,7.33,0h90.02 c2.02,0,3.85,0.83,5.18,2.15c1.33,1.33,2.15,3.16,2.15,5.18v50.14c0,1.74-1.41,3.15-3.15,3.15c-1.74,0-3.15-1.41-3.15-3.15V7.33 c0-0.28-0.12-0.54-0.31-0.72c-0.19-0.19-0.44-0.31-0.72-0.31H7.33c-0.28,0-0.54,0.12-0.73,0.3C6.42,6.8,6.3,7.05,6.3,7.33v108.21 c0,0.28,0.12,0.54,0.3,0.72c0.19,0.19,0.45,0.31,0.73,0.31H46.77L46.77,116.58z M98.7,74.34c-0.51-0.49-1.1-0.72-1.78-0.71 c-0.68,0.01-1.26,0.27-1.74,0.78l-3.91,4.07l10.97,10.59l3.95-4.11c0.47-0.48,0.67-1.1,0.66-1.78c-0.01-0.67-0.25-1.28-0.73-1.74 L98.7,74.34L98.7,74.34z M78.21,114.01c-1.45,0.46-2.89,0.94-4.33,1.41c-1.45,0.48-2.89,0.97-4.33,1.45 c-3.41,1.12-5.32,1.74-5.72,1.85c-0.39,0.12-0.16-1.48,0.7-4.81l2.71-10.45l0,0l20.55-21.38l10.96,10.55L78.21,114.01L78.21,114.01 z M39.62,86.95c-1.46,0-2.65-1.43-2.65-3.19c0-1.76,1.19-3.19,2.65-3.19h17.19c1.46,0,2.65,1.43,2.65,3.19 c0,1.76-1.19,3.19-2.65,3.19H39.62L39.62,86.95z M39.62,42.26c-1.46,0-2.64-1.41-2.64-3.14c0-1.74,1.18-3.14,2.64-3.14h34.89 c1.46,0,2.64,1.41,2.64,3.14c0,1.74-1.18,3.14-2.64,3.14H39.62L39.62,42.26z M24.48,79.46c2.06,0,3.72,1.67,3.72,3.72 c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72C20.76,81.13,22.43,79.46,24.48,79.46L24.48,79.46z M24.48,57.44 c2.06,0,3.72,1.67,3.72,3.72c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72C20.76,59.11,22.43,57.44,24.48,57.44 L24.48,57.44z M24.48,35.42c2.06,0,3.72,1.67,3.72,3.72c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72 C20.76,37.08,22.43,35.42,24.48,35.42L24.48,35.42z"/>
                        </g></svg>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">
                            <?php echo e($this->summary["all"]["count"]); ?>

                        </h1>
                        <p class="text-gray-600 text-sm">
                            <?php echo e($this->summary["all"]["name"]); ?>

                        </p>
                    </div>
                </div>
                <div class="p-6 rounded-lg shadow-md bg-white flex gap-3 items-center">
                    <svg class="size-10 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 117.45 122.88"
                         style="enable-background:new 0 0 117.45 122.88" xml:space="preserve"><g>
                            <path
                                d="M53.4,91.75c-1.96,0-3.54-1.59-3.54-3.54s1.59-3.54,3.54-3.54h19.85c1.96,0,3.54,1.59,3.54,3.54s-1.59,3.54-3.54,3.54H53.4 L53.4,91.75z M23.23,88.24c-0.8-1.2-0.48-2.82,0.72-3.63c1.2-0.8,2.82-0.48,3.63,0.72L29,87.45l5.65-6.88 c0.92-1.11,2.56-1.27,3.68-0.36c1.11,0.92,1.27,2.56,0.36,3.68l-7.82,9.51c-0.17,0.22-0.38,0.42-0.62,0.58 c-1.2,0.8-2.82,0.48-3.63-0.72L23.23,88.24L23.23,88.24z M23.23,63.34c-0.8-1.2-0.48-2.82,0.72-3.63c1.2-0.8,2.82-0.48,3.63,0.72 L29,62.55l5.65-6.88c0.92-1.11,2.56-1.27,3.68-0.36c1.11,0.92,1.27,2.56,0.36,3.68l-7.82,9.51c-0.17,0.22-0.38,0.42-0.62,0.58 c-1.2,0.8-2.82,0.48-3.63-0.72L23.23,63.34L23.23,63.34z M23.23,38.43c-0.8-1.2-0.48-2.82,0.72-3.63c1.2-0.8,2.82-0.48,3.63,0.72 L29,37.64l5.65-6.88c0.92-1.11,2.56-1.27,3.68-0.36c1.11,0.92,1.27,2.56,0.36,3.68l-7.82,9.51c-0.17,0.22-0.38,0.42-0.62,0.58 c-1.2,0.8-2.82,0.48-3.63-0.72L23.23,38.43L23.23,38.43z M53.4,39.03c-1.96,0-3.54-1.59-3.54-3.54s1.59-3.54,3.54-3.54h36.29 c1.96,0,3.54,1.59,3.54,3.54s-1.59,3.54-3.54,3.54H53.4L53.4,39.03z M8.22,0h101.02c2.27,0,4.33,0.92,5.81,2.4 c1.48,1.48,2.4,3.54,2.4,5.81v106.44c0,2.27-0.92,4.33-2.4,5.81c-1.48,1.48-3.54,2.4-5.81,2.4H8.22c-2.27,0-4.33-0.92-5.81-2.4 C0.92,119,0,116.93,0,114.66V8.22C0,5.95,0.92,3.88,2.4,2.4C3.88,0.92,5.95,0,8.22,0L8.22,0z M109.24,7.08H8.22 c-0.32,0-0.61,0.13-0.82,0.34c-0.21,0.21-0.34,0.5-0.34,0.82v106.44c0,0.32,0.13,0.61,0.34,0.82c0.21,0.21,0.5,0.34,0.82,0.34 h101.02c0.32,0,0.61-0.13,0.82-0.34c0.21-0.21,0.34-0.5,0.34-0.82V8.24c0-0.32-0.13-0.61-0.34-0.82 C109.84,7.21,109.55,7.08,109.24,7.08L109.24,7.08z M53.4,65.39c-1.96,0-3.54-1.59-3.54-3.54s1.59-3.54,3.54-3.54h36.29 c1.96,0,3.54,1.59,3.54,3.54s-1.59,3.54-3.54,3.54H53.4L53.4,65.39z"/>
                        </g></svg>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">
                            <?php echo e($this->summary["active"]["count"]); ?>

                        </h1>
                        <p class="text-gray-600 text-sm">
                            <?php echo e($this->summary["active"]["name"]); ?>

                        </p>
                    </div>
                </div>
                <div class="p-6 rounded-lg shadow-md bg-white flex gap-3 items-center">
                    <svg  class="size-10 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 104.69 122.88"
                         style="enable-background:new 0 0 104.69 122.88" xml:space="preserve"><g>
                            <path
                                d="M98.38,88.41l-9.79,10.48L98.38,88.41L98.38,88.41z M84.3,103.48l-9.79,10.48L84.3,103.48L84.3,103.48z M56.85,116.58 c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15H7.33c-2.02,0-3.85-0.82-5.18-2.15C0.82,119.4,0,117.57,0,115.55V7.33 c0-2.02,0.82-3.85,2.15-5.18C3.48,0.82,5.31,0,7.33,0h90.02c2.02,0,3.85,0.82,5.18,2.15c1.33,1.33,2.15,3.16,2.15,5.18V72.6 c0,1.74-1.41,3.15-3.15,3.15c-1.74,0-3.15-1.41-3.15-3.15V7.33c0-0.28-0.12-0.54-0.3-0.73c-0.19-0.19-0.45-0.3-0.73-0.3H7.33 c-0.28,0-0.54,0.12-0.73,0.3S6.3,7.05,6.3,7.33v108.21c0,0.28,0.12,0.54,0.3,0.73c0.19,0.19,0.44,0.3,0.73,0.3H56.85L56.85,116.58z M31.54,86.95c-1.74,0-3.16-1.43-3.16-3.19c0-1.76,1.41-3.19,3.16-3.19h20.5c1.74,0,3.16,1.43,3.16,3.19 c0,1.76-1.41,3.19-3.16,3.19H31.54L31.54,86.95z M31.54,42.27c-1.74,0-3.15-1.41-3.15-3.15c0-1.74,1.41-3.15,3.15-3.15h41.61 c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15H31.54L31.54,42.27z M31.54,64.59c-1.74,0-3.15-1.41-3.15-3.15 c0-1.74,1.41-3.15,3.15-3.15h41.61c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15H31.54L31.54,64.59z M71.52,91.55 c-1.27-1.18-1.34-3.17-0.16-4.44c1.18-1.27,3.17-1.34,4.44-0.16l10.49,9.79l9.78-10.48c1.18-1.27,3.17-1.34,4.44-0.16 c1.27,1.18,1.34,3.17,0.16,4.44l-9.79,10.48l10.48,9.78c1.27,1.18,1.34,3.17,0.16,4.44c-1.18,1.27-3.17,1.34-4.44,0.16l-10.48-9.79 l-9.78,10.48c-1.18,1.27-3.17,1.34-4.44,0.16c-1.27-1.18-1.34-3.17-0.16-4.44L82,101.34L71.52,91.55L71.52,91.55z"/>
                        </g></svg>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">
                            <?php echo e($this->summary["passive"]["count"]); ?>

                        </h1>
                        <p class="text-gray-600 text-sm">
                            <?php echo e($this->summary["passive"]["name"]); ?>

                        </p>
                    </div>
                </div>
            </div>
            <button wire:click="export"
                    class="btn btn-outline btn-outline-primary ml-auto !bg-white">

                <svg class="size-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z"/>
                </svg>

                <span wire:loading wire:target="export"
                      class="animate-pulse font-light">Məlumat emal olunur...</span>
                <span wire:target="export" wire:loading.class="hidden">
                        Excel faylı
                    </span>
            </button>
            <div class="my-container grid gap-4 overflow-auto">
                <table class="custom-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>Məhsul kodu</th>
                    <th>Məhsulun adı</th>
                    <th>Qeyd</th>
                    <th>Status</th>
                    <th>Tarix</th>
                    <th>Son düzəliş</th>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="whitespace-nowrap">
                                <button wire:click="select(<?php echo e($product->id); ?>)"
                                        class="btn btn-outline btn-small">
                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Düzəliş et
                                </button>
                            </td>
                            <td>
                                <?php echo e($product->pid); ?>

                            </td>
                            <td><?php echo e($product->name); ?></td>
                            <td>
                                <p class="whitespace-normal w-72 line-clamp-1 transition hover:line-clamp-none">
                                    <?php echo e($product->note); ?>

                                </p>
                            </td>
                            <td><?php echo e($product->visible ? "Aktiv" : "Deaktiv"); ?></td>
                            <td><?php echo e($product->created_at->format("d-m-Y h:i")); ?></td>
                            <td><?php echo e($product->updated_at->format("d-m-Y h:i")); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
                <?php echo e($this->products->links()); ?>

            </div>
        </div>

        <div class="w-80 grid gap-4 sticky top-4">
            <button
                class="btn btn-success btn-large justify-center"
                wire:click="$toggle('newProduct.state')">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Yeni məhsul
            </button>
            <div class="my-container grid gap-4">
                <div class="grid gap-1">
                    <div class="my-label">Sıralama</div>
                    <select class="input w-full" wire:model.live="orderBy">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $sortings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sorting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($sorting); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Məhsulun adı</div>
                    <input type="text" class="input w-full" wire:model="filters.name">
                </div>
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Status</div>
                    <select class="input w-full" wire:model="filters.visible">
                        <option value="">Ümumi</option>
                        <option value="1">Aktiv</option>
                        <option value="0">Passiv</option>
                    </select>

                </div>
                <div class="flex justify-end gap-3">
                    <button wire:click="search" class="btn btn-primary">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Axtar
                    </button>
                    <button wire:click="search(true)" class="btn btn-disabled !cursor-pointer">
                        <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <path
                                d="M19 19h-11l-4 -4a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9 9"/>
                            <path d="M18 12.3l-6.3 -6.3"/>
                        </svg>
                        Sıfırla
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/product/dashboard.blade.php ENDPATH**/ ?>