<div
    class="fixed top-0 left-0 h-dvh overflow-auto grid p-8 justify-items-center content-start bg-black/70 backdrop-blur w-full z-30">
    <div class="my-container w-1/2 grid gap-4">

        <div class="flex justify-between items-center">
            <p class="text-2xl font-bold">Müştərilər</p>
            <button class="my-input !p-2 text-sm inline-flex items-center gap-1.5"
                    wire:click="$toggle('customer.state')">
                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                    <line x1="1" y1="1" x2="23" y2="23"/>
                </svg>
                <span>Gizlə</span>
            </button>
        </div>
        <hr class="border-2 border-black">
        <input type="text" class="my-input" placeholder="Axtarış..." wire:model.live="searchUser">
        <div class="overflow-auto max-h-96 whitespace-nowrap">
            <table class="my-table">
                <thead>
                <th>Əməliyyatlar</th>
                <th>İstifadəçi kodu</th>
                <th>Ad və soyad</th>
                <th>Əlaqə nömrəsi</th>
                <th>Vəzifə</th>
                <th>Borc</th>
                <th>Balans</th>
                </thead>
                <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="flex gap-2">
                                <label for="user-<?php echo e($user->id); ?>"
                                       class="my-input inline-flex items-center gap-1.5 text-sm !p-2 transition cursor-pointer hover:font-medium hover:text-green-600">
                                    <input type="radio" value="<?php echo e($user->id); ?>" id="user-<?php echo e($user->id); ?>"
                                           wire:change="selectCustomer($event.target.value)"
                                           wire:model.live="customer.id">
                                    <span>Seç</span>
                                </label>
                                <a href="<?php echo e(url("user/details/$user->id")); ?>"
                                   target="_blank"
                                   class="my-input !p-2 text-sm inline-flex gap-1.5 items-center transition hover:text-blue-600">
                                    <svg class="size-5" width="24" height="24" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <circle cx="12" cy="12" r="9"/>
                                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                                        <polyline points="11 12 12 12 12 16 13 16"/>
                                    </svg>
                                    <span class="text-center flex-1">Ətraflı məlumat</span>
                                </a>
                            </div>
                        </td>
                        <td><?php echo e($user->pid); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->phone()); ?></td>
                        <td><?php echo e($user->role->name); ?></td>
                        <td><?php echo e($user->balance); ?> AZN</td>
                        <td><?php echo e($user->debt); ?> AZN</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
        <?php echo e($this->users->links()); ?>

    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/order/create/customer-selection.blade.php ENDPATH**/ ?>