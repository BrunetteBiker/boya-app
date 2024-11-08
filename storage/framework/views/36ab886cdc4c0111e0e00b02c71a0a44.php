<div class="grid gap-4">
    <div class="flex justify-end gap-4">
        <a href="<?php echo e(url("print/$order->id")); ?>"
           class="btn btn-primary">
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
                <div class="flex justify-between items-center text-blue-700">
                    <h1 class="text-xl font-bold">Ümumi məlumatlar</h1>
                    <button wire:click="$toggle('state.generalInfo')">
                        <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                </div>
                <div x-transition x-show="state" class="grid gap-4">
                    <hr class="border-2 border-zinc-100">
                    <ul class="grid gap-2">
                        <li>Sifariş kodu : <span class="font-semibold"><?php echo e($order->pid); ?></span></li>
                        <li>Qeydiyyat tarixi : <span
                                class="font-semibold"><?php echo e($order->created_at->format("d-m-Y h:i:s")); ?></span></li>
                        <li>Status : <span class="font-semibold"><?php echo e($order->status->name); ?></span></li>
                        <li>Ümumi cəm : <span class="font-semibold"><?php echo e($order->amount); ?> AZN</span></li>
                        <li>Endirim : <span class="font-semibold"><?php echo e($order->discount); ?> AZN</span></li>
                        <li>Yekun : <span class="font-semibold"><?php echo e($order->total); ?> AZN</span></li>
                        <!--[if BLOCK]><![endif]--><?php if($order->status_id != 4 ): ?>
                            <li>Ödənilib : <span class="font-semibold"><?php echo e($order->paid); ?> AZN</span></li>
                            <li>Borc : <span class="font-semibold"><?php echo e($order->debt); ?> AZN</span></li>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <li>İcraçı : <span class="font-semibold"><?php echo e($order->executor->name); ?></span></li>
                    </ul>
                </div>
            </div>
            <!--[if BLOCK]><![endif]--><?php if($order->status_id == 1): ?>
                <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.ready')}">
                    <div class="flex justify-between items-center text-blue-700">
                        <h1 class="text-xl font-bold">Sifariş hazırdır</h1>
                        <button wire:click="$toggle('state.ready')">
                            <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </button>
                    </div>
                    <div x-transition x-show="state" class="grid gap-4">
                        <hr class="border-2 border-zinc-100">
                        <div class="grid gap-1">
                            <div class="my-label">Qeyd</div>
                            <textarea class="input" rows="3"
                                      wire:model="readyData.note"></textarea>
                            <small class="text-xs italic">Ehtiyyac olmadığı halda bu bölmə boş saxlanıla bilər</small>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="inline-flex items-center gap-1.5 flex-1">
                                <div class="my-label">Təsdiqləyən</div>
                                <input type="text" class="input flex-1" disabled value="<?php echo e(auth()->user()->name); ?>"></div>
                            <button wire:loading.class="!hidden" wire:click="changeStatusToReady"
                                    class="btn btn-success ml-auto">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                                Təsdiqlə
                            </button>
                        </div>
                        <p wire:loading wire:target="changeStatusToReady" class="loading-text">Sorğunuz icra olunur...</p>

                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if($order->status_id == 2): ?>
                <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.delivered')}">
                    <div class="flex justify-between items-center text-blue-700">
                        <h1 class="text-xl font-bold">Sifarişin təhvili</h1>
                        <button wire:click="$toggle('state.delivered')">
                            <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </button>
                    </div>
                    <div x-transition x-show="state" class="grid gap-4">
                        <hr class="border-2 border-zinc-100">
                        <div class="grid gap-1">
                            <div class="my-label">Qeyd</div>
                            <textarea class="input" rows="3"
                                      wire:model="deliveredData.note"></textarea>
                            <small class="text-xs italic">Ehtiyyac olmadığı halda bu bölmə boş saxlanıla bilər</small>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="inline-flex items-center gap-1.5 flex-1">
                                <div class="my-label">Təhvil verən</div>
                                <input type="text" class="input flex-1" disabled value="<?php echo e(auth()->user()->name); ?>"></div>
                            <button wire:loading.class="!hidden" wire:click="changeStatusToDelivered"
                                    class="btn btn-primary">
                                <svg class="size-6" fill="currentColor"
                                     style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                     viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Layer_x0020_1">
                                        <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                        <g id="_570681032">
                                            <g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M399 336c-7,0 -15,-3 -21,-9 -3,-3 -3,-7 0,-10 3,-3 7,-3 10,0 6,6 17,6 23,0 5,-6 5,-16 0,-22 -4,-4 -10,-10 -17,-17 -12,-13 -28,-29 -34,-33 -16,-8 -31,-16 -46,-24 -15,-8 -31,-16 -46,-24 0,0 0,0 0,0 -4,-2 -6,-1 -7,-1 -7,2 -13,14 -16,20 -4,9 -12,15 -22,15 -11,1 -23,-4 -29,-13 -6,-9 -6,-19 0,-29 16,-30 48,-77 82,-61 25,11 65,29 71,31 3,-1 9,-4 25,-13l2 -1c4,-2 8,-1 10,2 2,4 1,8 -3,10l-2 1c-25,15 -31,17 -36,14 -9,-3 -53,-23 -73,-32 0,0 0,0 0,0 -25,-11 -55,39 -64,55 -3,6 -3,11 0,15 3,5 9,8 16,7 3,0 8,-1 10,-7 0,0 1,0 1,0 5,-12 12,-24 24,-28 5,-1 11,-1 17,3 16,8 31,16 46,24 15,8 31,16 46,24 0,0 0,0 0,0 8,4 20,17 38,35 6,7 13,13 16,17 1,0 1,0 1,0 10,12 10,30 0,42 0,0 0,0 0,0 -6,6 -14,9 -22,9z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M161 185c-1,0 -2,0 -3,-1l-27 -14c-4,-1 -5,-6 -3,-9 2,-3 6,-5 9,-3l21 11c10,-20 23,-31 38,-35 22,-5 39,8 40,9 3,2 4,6 2,9 -3,3 -7,4 -10,2 0,-1 -14,-10 -29,-6 -12,3 -23,14 -32,33 0,2 -2,3 -4,4 -1,0 -1,0 -2,0z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M404 285c-3,0 -5,-1 -6,-3 -2,-4 -1,-8 3,-10l36 -20c3,-2 7,-1 9,3 2,3 1,7 -3,9l-36 20c-1,1 -2,1 -3,1z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M196 404c-7,0 -13,-2 -18,-7 -5,-5 -7,-11 -7,-17 0,-7 2,-13 7,-18 3,-2 7,-2 10,0 3,3 3,8 0,10 -2,2 -3,5 -3,8 0,3 1,5 3,7 2,2 5,4 8,4 3,0 6,-2 8,-4l24 -24c2,-2 3,-4 3,-7 0,-3 -1,-6 -3,-8 -2,-2 -5,-3 -8,-3 -3,0 -6,1 -8,3 -3,3 -7,3 -10,0 -3,-2 -3,-7 0,-10 5,-4 11,-7 18,-7 7,0 13,3 18,7 5,5 7,11 7,18 0,6 -2,12 -7,17l-24 24c-5,5 -11,7 -18,7z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M170 379c-6,0 -12,-2 -17,-7 -5,-5 -7,-11 -7,-18 0,-7 2,-13 7,-18l36 -35c10,-9 25,-9 35,0 10,10 10,25 0,35l-36 36c-5,5 -11,7 -18,7zm36 -71c-2,0 -5,1 -7,3l-36 35c-4,4 -4,12 0,16 4,4 11,4 15,0l36 -36c4,-4 4,-11 0,-15 -2,-2 -5,-3 -8,-3z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M145 353c-6,0 -12,-2 -17,-7 -4,-4 -7,-10 -7,-16 -1,-7 2,-14 7,-19l30 -30c5,-4 11,-7 17,-7 7,0 13,3 18,7 4,5 7,11 7,18 0,6 -2,12 -7,17 -3,3 -7,3 -10,0 -3,-3 -3,-7 0,-10 2,-2 3,-5 3,-7 0,-3 -1,-6 -3,-8 -2,-2 -5,-3 -8,-3 -3,0 -5,1 -7,3l-30 30c-2,2 -4,5 -4,8 1,3 2,5 3,7 0,0 1,0 1,0 2,2 4,3 7,3 3,0 6,-1 8,-3 3,-3 7,-3 10,0 3,3 3,7 0,10 -5,5 -11,7 -18,7z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M120 328c-7,0 -13,-2 -18,-7 -10,-10 -10,-25 0,-35l10 -10c10,-10 25,-10 35,0 10,10 10,26 0,36 -2,2 -5,3 -7,2 1,2 0,5 -2,7 -5,5 -12,7 -18,7zm10 -45c-3,0 -6,1 -8,3l-10 10c-4,4 -4,11 0,15 4,5 12,5 16,0 2,-2 5,-2 7,-1 -1,-3 0,-6 2,-8 4,-4 4,-12 0,-16 -2,-2 -5,-3 -7,-3z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M107 299c-1,0 -2,0 -3,-1l-35 -20c-4,-2 -5,-6 -3,-9 2,-4 6,-5 10,-3l35 20c3,2 4,6 2,10 -1,2 -4,3 -6,3z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M283 415c-8,0 -15,-3 -21,-9l-30 -29c-3,-3 -3,-7 0,-10 3,-3 7,-3 10,0l30 29c0,0 0,0 0,0 6,6 16,6 22,0 6,-6 6,-16 0,-22 -3,-3 -3,-7 0,-10 3,-3 7,-3 10,0 12,12 12,30 0,42 -6,6 -14,9 -21,9z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M335 403c-8,0 -15,-3 -21,-9l-49 -50c-3,-3 -3,-7 0,-10 3,-2 7,-2 10,0l49 50c6,7 17,7 23,0 6,-6 6,-16 0,-23 -3,-2 -3,-7 0,-10 3,-2 7,-2 10,0 6,6 9,14 9,22 0,8 -3,16 -9,21 -6,6 -13,9 -22,9z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M377 380c-7,0 -15,-3 -21,-9l-59 -59c-3,-3 -3,-7 0,-10 3,-3 7,-3 10,0l59 59c6,6 17,6 23,0 6,-6 6,-17 0,-23l-59 -59c-3,-3 -3,-7 0,-10 3,-3 7,-3 10,0l59 59c12,12 12,31 0,43 -6,6 -14,9 -22,9z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M454 280c-7,0 -13,-4 -16,-11l-70 -121c-3,-4 -4,-9 -3,-14 1,-5 5,-10 10,-12l38 -22c5,-3 10,-4 15,-2 5,1 9,4 11,9l70 121c3,5 4,10 2,15 -1,5 -4,9 -9,11l-38 23c-1,0 -1,0 -1,0 -3,2 -6,3 -9,3zm-31 -169c0,0 -1,0 -2,1 0,0 0,0 -1,0l-39 22c0,0 0,0 0,0 -1,1 -2,2 -2,3 0,1 0,2 1,3 0,0 0,0 0,1l70 122c0,0 0,0 0,0 2,3 5,3 7,2l39 -23c0,0 0,0 0,0 1,-1 2,-1 2,-2 0,-1 0,-3 -1,-4 0,0 0,0 0,0l-70 -122c0,0 0,0 0,-1 -1,-1 -1,-1 -2,-2 -1,0 -1,0 -2,0zm-45 17l0 0 0 0z"></path>
                                                </g>
                                                <g>
                                                    <path class="fil0"
                                                          d="M58 293c-3,0 -6,-1 -9,-3 0,0 -1,0 -1,0l-38 -23c-5,-2 -9,-6 -10,-12 -1,-4 0,-9 3,-13l70 -122c0,0 0,0 0,0 5,-9 16,-12 25,-7 0,0 0,0 1,0l38 23c5,2 9,7 10,12 1,4 0,9 -3,13l-70 123c0,0 0,0 0,0 -3,5 -10,9 -16,9zm10 -13l0 0 0 0zm-13 -2c3,1 6,0 7,-1l70 -123c0,-1 0,-1 1,-1 0,-1 0,-1 0,-2 0,-1 -1,-2 -2,-3 0,0 -1,0 -1,0l-38 -23c-3,-1 -6,0 -7,2l-70 123c0,0 0,0 -1,1 0,0 0,1 0,1 0,1 1,2 2,3 0,0 1,0 1,0l38 23z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
</svg>
                                Təsdiqlə
                            </button>
                        </div>
                        <p wire:loading wire:target="changeStatusToDelivered" class="loading-text">Sorğunuz icra olunur...</p>

                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if($order->status_id != 4): ?>
                <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.cancel')}">
                    <div class="flex justify-between items-center text-blue-700">
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
                        <hr class="border-2 border-zinc-100">
                        <div class="grid gap-1">
                            <div class="my-label">Ləğv səbəbi</div>
                            <textarea class="input" rows="3"
                                      wire:model="cancelledData.note"></textarea>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="inline-flex items-center gap-1.5 flex-1">
                                <div class="my-label">Ləğv edən</div>
                                <input type="text" class="input flex-1" disabled value="<?php echo e(auth()->user()->name); ?>"></div>
                            <button wire:loading.class="!hidden" wire:click="changeStatusToCancelled" wire:click="changeStatusToCancelled"
                                    class="btn btn-danger">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                Ləğv et
                            </button>

                        </div>
                        <p wire:loading wire:target="changeStatusToCancelled" class="loading-text">Sorğunuz icra olunur...</p>

                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.customerInfo')}">
            <div class="flex justify-between items-center text-blue-700">
                <h1 class="text-xl font-bold">Müştəri məlumatları</h1>
                <button wire:click="$toggle('state.customerInfo')">
                    <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
            </div>
            <div x-transition x-show="state" class="grid gap-4">
                <hr class="border-2 border-zinc-100">
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
                       class="btn btn-outline btn-outline-primary">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Ətraflı məlumat
                    </a>
                    <a href="<?php echo e(url("order/create?customer=$order->customer_id")); ?>" target="_blank"
                       class="btn btn-outline btn-outline-success">
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
        <div class=" flex justify-between items-center text-blue-700">
            <h1 class="text-xl font-bold">Ödənişlər</h1>
            <button wire:click="$toggle('state.payments')">
                <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div x-transition x-show="state" class="grid gap-4">
            <hr class="border-2 border-zinc-100">
            <div class="flex gap-4 items-start">
                <div class="flex-1">
                    <table class="custom-table">
                        <thead>
                        <th>Əməliyyatlar</th>
                        <th>Ödəniş kodu</th>
                        <th>Məbləğ</th>
                        <th>Qəbul edən</th>
                        <th>Ödəniş tarixi</th>
                        </thead>
                        <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $this->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <a href="" class="btn btn-outline btn-outline-primary btn-small">
                                        <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                             stroke="currentColor" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <path
                                                d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"/>
                                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"/>
                                            <rect x="7" y="13" width="10" height="8" rx="2"/>
                                        </svg>
                                        Qəbz çap et
                                    </a>
                                </td>
                                <td><?php echo e($payment->pid); ?></td>
                                <td><?php echo e($payment->amount); ?> AZN</td>
                                <td><?php echo e($payment->executor->name); ?></td>
                                <td><?php echo e($payment->created_at->format("d-m-Y h:i:s")); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5">
                                    <p class="font-bold p-8 text-slate-600 text-center text-3xl">Ödəniş tapılmadı</p>
                                </td>
                            </tr>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
                <!--[if BLOCK]><![endif]--><?php if($order->debt > 0 && $order->status_id != 4): ?>
                    <div class="my-container w-80">
                        <div class="grid gap-3">
                            <div class="grid gap-1">
                                <div class="my-label">Qəbul edən</div>
                                <input type="text" class="input" value="<?php echo e(auth()->user()->name); ?>" disabled>








                            </div>
                            <div class="grid gap-1">
                                <div class="my-label">Ödəniş miqdarı</div>
                                <input type="number" step="0.01" class="input" wire:model.blur="paymentData.amount" wire:blur="calculate">
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if($paymentData["reminder"] > 0): ?>
                                <div class="grid gap-1">
                                    <div class="my-label">Qalıq</div>
                                    <input type="text" class="input" disabled wire:model.live="paymentData.reminder">
                                </div>
                                <label for="add-to-balance" class="input input-small cursor-pointer ml-auto">
                                    <input type="checkbox" value="1" wire:model="paymentData.addToBalance" id="add-to-balance">
                                    <span>Balansa əlavə et</span>
                                </label>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <div class="grid gap-1">
                                <div class="my-label">Cari borc</div>
                                <input type="text" class="input" disabled wire:model.live="paymentData.debt">
                            </div>
                            <div class="grid gap-1">
                                <div class="my-label">Qeyd</div>
                                <textarea class="input" rows="3" wire:model="paymentData.note"></textarea>
                            </div>
                            <div class="grid gap-3">
                                <button wire:loading.class="hidden" type="button" wire:click="pay('cash')"
                                        class="btn btn-success inline-flex items-center gap-1.5">
                                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                    <span class="text-center flex-1">Mədaxil et</span>
                                </button>
                                <button wire:loading.class="hidden" type="button" wire:click="pay('balance')"
                                        class="btn btn-primary inline-flex gap-1.5 items-center">
                                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                    <span class="text-center flex-1">Balansdan ödə</span>
                                </button>
                            </div>
                            <p wire:loading wire:target="pay" class="loading-text">
                                Sorğunuz
                                icra olunur...</p>

                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
    <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.orderItems')}">
        <div class="flex justify-between items-center text-blue-700">
            <h1 class="text-xl font-bold">Məhsullar</h1>
            <button wire:click="$toggle('state.orderItems')">
                <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div x-transition x-show="state" class="grid gap-4">
            <hr class="border-2 border-zinc-100">
            <table class="custom-table">
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
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/order/details.blade.php ENDPATH**/ ?>